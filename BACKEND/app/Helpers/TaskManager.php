<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\Feladat;
use App\Models\Tool;
use App\Models\User;
use Illuminate\Support\Carbon;

class TaskManager
{
    public static function feladatSzakemberhezRendelese($karbantartas)
    {
        $vanVegzettsegeSzakemberek = self::vegzettsegekEgyeztetse($karbantartas);
        //$vanVegzettsegeSzakemberek = self::torolMarHozzarendeltSzemelyt($vanVegzettsegeSzakemberek, $karbantartas);
        $alkalmasSzakemberek = self::kinekVanRaIdeje($vanVegzettsegeSzakemberek, $karbantartas);
        $msg = "";
        $alert = "";

        /**
         * Megnézzük hogy megfelelő képzettsége és van rá ideja.
         */
        if ($alkalmasSzakemberek->isEmpty()) {
            /**
             * Ha nincs akkornézzük az összes embert majd vonjuk ki azokat akiknek nincs ideje és van megfelelő végzetsége hozzá.
             */
            $kevesbeKepzettSzakember = self::legtobbSzuksegesVegzettsegel($karbantartas);
            //$kevesbeKepzettSzakember = self::torolMarHozzarendeltSzemelyt($kevesbeKepzettSzakember, $karbantartas);
            /**
             * Nézzük meg azokat akiknek legalább 1 végzettsége van hozzá, hogy köztük kinek van ideje.
             */
            $kevesbeKepzettSzakemberVanIdo = self::kinekVanRaIdeje($kevesbeKepzettSzakember, $karbantartas);

            /**
             * Nézzük van(nak)-e ilyen szémelyek akik kevésbé képzetek
             */
            if ($kevesbeKepzettSzakemberVanIdo->isEmpty()) {

                $nemMegfeleloSzakember = User::all()->filter(function ($szemely) use ($alkalmasSzakemberek, $kevesbeKepzettSzakember) {
                    return !in_array($szemely->id, array_merge($alkalmasSzakemberek->pluck("id")->toArray(), $kevesbeKepzettSzakember->pluck("id")->toArray()));
                });

                //$nemMegfeleloSzakember = self::torolMarHozzarendeltSzemelyt($nemMegfeleloSzakember, $karbantartas);

                /**
                 * Ha nincs kevésbé képzett, nézzük van-e képzetlen szabad idővel rendelkező
                 */
                if ($nemMegfeleloSzakember->isEmpty()) {
                    /**
                     * Ha senki nem felel meg akkor kaphatja olyan aki már elutasította újra kapja.
                     */

                    $feladat_elvegzo = self::feladatHozzarendeleseSzakemberhez($alkalmasSzakemberek, $karbantartas);
                    $msg = "Újra ki lett osztva ugyan annak a személynek aki elutasította!";
                    $alert = "daanger";
                } else {
                    /**
                     * Olyan kapja akinek nincs megfelelő képzettsége.
                     */
                    $feladat_elvegzo = self::feladatHozzarendeleseSzakemberhez($nemMegfeleloSzakember, $karbantartas);
                    $msg = "Sajnos nincs megfelelő se kevésbé képzett személy ezért egy embernek lett kiosztva akinek van ideje.";
                    $alert = "danger";
                }

            } else {
                /**
                 * Ha vannak akkor keresünk közte 1-et akihez hozzá rendeljük
                 */
                $feladat_elvegzo = self::feladatHozzarendeleseSzakemberhez($kevesbeKepzettSzakember, $karbantartas);
                $msg = "Sajnos nem találtunk elég képzett embert csak kevésbé képzetett akinek van szaba ideje!";
                $alert = "warning";
            }

        } else {
            /**
             * Ha minden klappol akkor van ideje és megfelelő végzettsége.
             */
            $feladat_elvegzo = self::feladatHozzarendeleseSzakemberhez($alkalmasSzakemberek, $karbantartas);
            $msg = "Sikerült megfelelő embert találni akinek van ideje és megfelelő végzettsége a feladathoz!";
            $alert = "success";
        }

        return ['szakember' => $feladat_elvegzo, 'msg' => $msg, 'alert' => $alert];
    }

    private static function vegzettsegekEgyeztetse($karbantartas)
    {
        $szukseges_vegzettsegek = self::getSzuksegesVegzettsegek($karbantartas);

        $szakemberek = User::with('kepesitesek')->whereHas('kepesitesek', function ($query) use ($szukseges_vegzettsegek) {
            $query->whereIn('kepesites.vegzettsegid', $szukseges_vegzettsegek);
        })
            ->get();

        return $szakemberek;
    }

    public static function getSzuksegesVegzettsegek($karbantartas)
    {
        /**
         * Karbantartás által megkeressni melyik kategóriához tartozik, itt szedjük ki a ketegória id-ját.
         */
        $kategoriaid = Tool::find($karbantartas->eszkozid)->kategoriaid;

        /**
         *  Kategória id alapján megkeressük a kategóriát ami az eszközhöz tartozik, Collection-el tér vissza nekünk az első kell.
         */
        $kategoriak = Category::find($kategoriaid)->first();

        /**
         * Itt nyerjük ki a kategóriákhoz tartozó végzettségeket, majd mapeljük ki csak a végzetség id-kat és azt tömbé alakítjuk.
         */
        return $kategoriak->vegzettseg
            ->map(fn($vegzettseg) => $vegzettseg->id)
            ->toArray();
    }

    private static function torolMarHozzarendeltSzemelyt($szakemberek, $karbantartas)
    {

        $ids = $karbantartas->feladat
            ->search([
                function ($item, $key) use($karbantartas) {
                   return true;
                }
            ])
            ->first();

        return $szakemberek->filter(function ($szemely) use ($ids) {
            return !in_array($szemely->id, [$ids->szakemberid]);
        });
    }

    private static function kinekVanRaIdeje($szakemberek, $karbantartas)
    {

        $szabad_szakemberek = $szakemberek;

        foreach ($szakemberek as $szakember) {

            foreach ($szakember->feladat as $feladat) {
                if (Carbon::create($karbantartas->idopont)->format("Y-m-d") == Carbon::create($feladat->idopont)->format("Y-m-d")) {
                    $normaido = Carbon::createFromTimeString($karbantartas->tools->category->normaido, 'Europe/London');
                    $karbantartas_ido = Carbon::createFromTimeString($karbantartas->idopont, 'Europe/London');

                    $munka_kezdeti_ideje = $normaido->second + $normaido->minute * 60 + $normaido->hour * 3600;
                    $munka_befejezes_ideje = $munka_kezdeti_ideje + $karbantartas_ido->second + $karbantartas_ido->minute * 60 + $karbantartas_ido->hour * 3600;


                    $normaido = Carbon::createFromTimeString($feladat->tools->category->normaido, 'Europe/London');
                    $karbantartas_ido = Carbon::createFromTimeString($feladat->idopont, 'Europe/London');

                    $feladat_kezdeti_ideje = $normaido->second + $normaido->minute * 60 + $normaido->hour * 3600;
                    $feladat_befejezes_ideje = $feladat_kezdeti_ideje + $karbantartas_ido->second + $karbantartas_ido->minute * 60 + $karbantartas_ido->hour * 3600;

                    if (($munka_kezdeti_ideje > $feladat_kezdeti_ideje && $munka_befejezes_ideje < $feladat_befejezes_ideje)
                        || ($munka_kezdeti_ideje < $feladat_kezdeti_ideje && $munka_befejezes_ideje > $feladat_befejezes_ideje)) {
                        $szabad_szakemberek = $szabad_szakemberek->filter(function ($szemely) use ($szakember) {
                            return $szemely->id == $szakember->id;
                        });
                    }
                }
            }

        }

        return $szabad_szakemberek;

    }

    /**
     * Megnézzük kinek van legalább 1 olyan végzetsége ami elegendő a feladat elvégzéséhez és azokkal
     * a szakemberekkel vissza térünk.
     *
     * @param $szukseges_vegzettsegek
     * @return mixed
     */
    private static function legtobbSzuksegesVegzettsegel($karbantartas)
    {

        $szukseges_vegzettsegek = self::getSzuksegesVegzettsegek($karbantartas);

        return User::whereHas('kepesitesek', function ($query) use ($szukseges_vegzettsegek) {
            $query->where(function ($query) use ($szukseges_vegzettsegek) {
                foreach ($szukseges_vegzettsegek as $szv)
                    $query->orWhere('kepesites.vegzettsegid', $szv);
            });
        })
            ->get()
            ->sortBy([
                function ($szakember1, $szakember2) use ($szukseges_vegzettsegek) {
                    $a = $szakember1->kepesitesek->pluck('id')->all();
                    $b = $szakember2->kepesitesek->pluck('id')->all();
                    return count(array_diff($szukseges_vegzettsegek, $a)) > count(array_diff($szukseges_vegzettsegek, $b));
                }
            ]);
    }

    private static function feladatHozzarendeleseSzakemberhez($szakemberek, $karbantartas)
    {
        /**
         * Rendezzük hogy kinek van a legtöbb ideje aznap.
         */
        $szakemberek = $szakemberek->sortBy([
            function ($szakember1, $szakember2) use ($karbantartas) {
                $a = 0;
                $b = 0;

                foreach ($szakember1->feladat as $feladat) {
                    if (Carbon::create($karbantartas->idopont)->format("Y-m-d") == Carbon::create($feladat->idopont)->format("Y-m-d")) {
                        $time = Carbon::createFromTimeString($feladat->tools->category->normaido, 'Europe/London');
                        $a += $time->second + $time->minute * 60 + $time->hour * 3600;
                    }
                }

                foreach ($szakember2->feladat as $feladat) {
                    if (Carbon::create($karbantartas->idopont)->format("Y-m-d") == Carbon::create($feladat->idopont)->format("Y-m-d")) {
                        $time = Carbon::createFromTimeString($feladat->tools->category->normaido, 'Europe/London');
                        $b += $time->second + $time->minute * 60 + $time->hour * 3600;
                    }
                }

                return $a > $b;
            }
        ]);

        /**
         * Vegyök az elsőt
         */
        $feladat_elvegzo = $szakemberek->first();

        /*if ($karbantartas->allapot == "Elutasitva" && $feladat_elvegzo->vanIlyenFeladata()) {
            self::meglevoKapjaMegint($karbantartas);
        }*/

        /**
         * Rendeljük hozzá a feladatot.
         */
        Feladat::create([
            'karbantartasid' => $karbantartas->id,
            'szakemberid' => $feladat_elvegzo->id,
            'idopont' => $karbantartas->idopont,
            'elfogadtaE' => null,
            'indoklas' => ""
        ])
            ->save();

        return $feladat_elvegzo;
    }

    private static function meglevoKapjaMegint($karbantartas)
    {
        $feladat = Feladat::all()
            ->where("karbantartasid", "=", $karbantartas->id, "szakember")
            ->sortByDesc("id")
            ->first();

        $feladat->update(['elfogadtaE' => null, 'indoklas' => null, 'idopont' => $karbantartas->idopont]);

        $karbantartas->allapot = "ütemezve";
        $karbantartas->save();
    }
}
