<x-app-layout>

    <div class="container">

        @if(isset($result))
        <div class="alert alert-{{ $result["alert"] }} alert-dismissible fade show" role="alert">
            <p>{{ $result["msg"] }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <table class="table">
            <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Eszköz azonosító</th>
                <th scope="col">Rendkívüli hiba</th>
                <th scope="col">Hiba súlyossága</th>
                <th scope="col">Időpont</th>
                <th scope="col">Állapot</th>
                <th scope="col">Leírás</th>
            </tr>

            </thead>
            <tbody>

                @foreach ($allKarbantartasok as $karbantartas)
                    <tr>
                        <td scope="row">{{ $loop->index+1 }}</td>
                        <td>{{ $karbantartas->eszkozid }}</td>
                        <td>{{ $karbantartas->hibaE ? "Igen" : "Nem" }}</td>
                        <td>{{ $karbantartas->sulyossag }}</td>
                        <td>{{ $karbantartas->idopont }}</td>
                        <td>{{ $karbantartas->allapot }}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#leiraseModal{{ $loop->index+1 }}">
                                <i class="bi bi-body-text"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="leiraseModal{{ $loop->index+1 }}" tabindex="-1" aria-labelledby="leiraseModal{{ $loop->index+1 }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="leiraseModal{{ $loop->index+1 }}Label">{{ $karbantartas->eszkozid }} hiba leírása</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{ $karbantartas->leiras }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezár</button>
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
