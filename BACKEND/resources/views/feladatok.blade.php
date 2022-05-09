<x-app-layout>

    <div class="container">

        <table class="table">
            <thead>

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Név</th>
                    <th scope="col">Elhelyezkedés</th>
                    <th scope="col">Súlyosság</th>
                    <th scope="col">Állapot</th>
                    <th scope="col">Leírás</th>
                    <th scope="col">Normaidő</th>
                    <th scope="col">Instrukciók</th>
                    <th scope="col">Opciók</th>
                </tr>

            </thead>
            <tbody>

                @foreach ($allFeladatok as $feladat)
                <tr>
                    <td scope="row">{{ $loop->index }}</td>
                    <td>{{ $feladat->nev }}</td>
                    <td>{{ $feladat->elhelyezkedes }}</td>
                    <td>{{ $feladat->sulyossag }}</td>
                    <td>{{ $feladat->allapot }}</td>
                    <td>{{ $feladat->leiras }}</td>
                    <td>{{ $feladat->normaido }}</td>
                    @if ($feladat->allapot == 'Megkezdve')
                    <td>{{ $feladat->karbantartasInstrukcio }}</td>
                    @else
                    <td></td>
                    @endif
                    <td>
                        <!--
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                ...
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <p class="dropdown-item">
                                    <form method="POST" action="{{ route('feladatok.elfogad') }}">
                                        @csrf
                                        <div class="flex items-center justify-end mt-4">
                                            <x-button class="btn-success mx-3">
                                                <i class="bi bi-check2"></i>
                                            </x-button>
                                        </div>
                                        </form>
                                    </p>
                                </li>
                                <li>
                                    <p class="dropdown-item">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#leiraseModal{{ $loop->index }}">
                                            <i class="bi bi-x-lg"></i>
                                        </button>
                                    </p>
                                </li>
                            </ul>
                        </div>
-->
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            @if ($feladat->allapot == 'Ütemezve')
                            <form method="POST" action="{{ route('feladatok.elfogad') }}">
                                <input type="hidden" name="id" value="{{ $feladat->id }}">
                                @csrf
                                <button type="submit" class="btn btn-success">Elfogadás</button>
                            </form>
                            @endif
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#leiraseModal{{ $loop->index }}">Elutasítás</button>
                            @if ($feladat->allapot == 'Elfogadva')
                            <form method="POST" action="{{ route('feladatok.megkezd') }}">
                                <input type="hidden" name="id" value="{{ $feladat->id }}">
                                @csrf
                            <button type="submit" class="btn btn-warning">Megkezdés</button>
                            </form>
                            @endif
                            @if ($feladat->allapot == 'Megkezdve')
                            <form method="POST" action="{{ route('feladatok.befejez') }}">
                                <input type="hidden" name="id" value="{{ $feladat->id }}">
                                @csrf
                            <button type="submit" class="btn btn-secondary">Befejezés</button>
                            </form>
                            @endif
                        </div>





                        <!-- Modal -->
                        <div class="modal fade" id="leiraseModal{{ $loop->index }}" tabindex="-1" aria-labelledby="leiraseModal{{ $loop->index }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="leiraseModal{{ $loop->index }}Label">Feladat elutasítása</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('feladatok.update') }}">
                                            <input type="hidden" name="id" value="{{ $feladat->id }}">
                                            Jelenlegi állapot: {{ $feladat->allapot }}
                                            <div class="mb-3">
                                                <textarea class="form-control" placeholder="Indokolja meg .." id="indoklas" name="indoklas" style="height: 100px">{{ old('indoklas')}}</textarea>

                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        @csrf
                                        <div class="flex items-center justify-end mt-4">
                                            <x-button class="btn-success">
                                                {{ __('Elutasítás') }}
                                            </x-button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>

</x-app-layout>