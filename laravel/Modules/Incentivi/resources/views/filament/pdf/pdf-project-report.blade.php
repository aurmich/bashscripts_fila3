<html lang="en">

<head>
    <title>Resoconto Progetto</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="{{ $_theme->asset('ptv::dist/assets/app.css') }}">
</head>

<body>


    <div class=" w-[210mm] p-12">

        <img src="{{ asset('assets/ptv/img/logo.png') }}">

        <div class="flex justify-between pt-6">
            <div>
                <p>Treviso, <span> {{ now()->format('d/m/Y') }} </span> </p>
                <br>
                <p class="pb-3 text-xl font-bold">OGGETTO: {{ $project->nome }}</p>
                <p class="text-sm">Descrizione: <span class="pl-1 font-normal"><strong>{{ $project->oggetto }}</strong></span></p>
            </div>
        </div>
        <br>
        <div>
            <p class="text-sm text-center">
                Visto il regolamento per la disciplina delle modalità e dei criteri di ripartizione del fondo
                incentivante previsto dall'art. 113 del D.lgs. 50/2016 e s.m.i.;
            </p>
            <br>
            <p class="text-sm"> Vista la determinazione dirigenziale <strong>{{ $project->determina }}</strong>
                avente ad oggetto: <strong>{{ $project->oggetto }}</strong>
            </p>
            <br>
            <p class="text-sm"> L'intervento in oggetto riguarda Appalti di <strong>{{ $project->tipo }}</strong>
                per un valore di <strong>{{ $project->importo_totale }} €</strong> per cui la
                percentuale applicabile per il calcolo del fondo è pari al <strong>{{ $project->percentuale_fondo }} %</strong>.
                L'incentivo previsto per i lavori in oggetto relativamente alla fase progettuale e alla fase di esecuzione e collaudo,
                ammonta a complessivi <strong>{{ $project->importo_effettivo_fondo }} €</strong>,
                da cui vengono dedotte la quota del 20% per il fondo per l'innovazione pari a <strong>{{ $project->componente_innovazione }} €</strong>
                e le quote per incarichi professionali esterni pari ad ???
                e di consequenza la somma liquidabile da ripartire internamente risulta pari a <strong>{{ $project->componente_incentivante }} €</strong>.
            </p>
            <br>
            <p class="text-sm"> Sentito il RUP del procedimento in oggetto: <strong> {{ $rup }} </strong> </p>
            <br>
            <p class="text-sm"> Visto il dispone del: <strong>{{ $project->data_aggiudicazione }}</strong> </p>
            <br>
            <p class="text-sm underline"> Attuate le corrette correzioni al gruppo di lavoro ed al lavoro eseguito
                dovute dalla dinamicità del progetto
            </p>

            <br><br>

            <p class="text-sm font-bold text-center"> DISPONE </p>
            <br>
            <p class="text-sm"> di approvare la liquidazione della fase di aggiudicazione del gruppo di lavoro e di
                ripartire la quota come indicato nelle tabelle allegate. </p>
            <br>

            <div class="flex justify-end">
                <p class="text-sm ">Il Dirigente del Settore {{ $project->settore }}</p>
            </div>






        </div>
        <br><br><br><br>

        @pageBreak

        <p class="text-2xl font-medium"> <strong> CALCOLO FONDO INCENTIVANTE {{ $project->tipo }}</strong> </p>
        <p class="text-sm"> In conformità con l'ex articolo 45, D.LGS 36/2023 e in applicazione del regolamento
            approvato il 23/08/24. Protocollo 43254/2024 </p>

        <div class="pt-4">
            <table class="w-full table-auto text-sm border-separate border border-slate-400">
                <thead class="border-b-2">
                    <tr class="h-10 text-left">
                        <th>Descrizione</th>
                        <th>%</th>
                        <th>Importo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="h-10">
                        <td>Importo dei lavori a base d'asta (art.5 comma 2).</td>
                        <td>/</td>
                        <td>{{ $project->importo_totale }} €</td>
                    </tr>
                    <tr class="h-10">
                        <td>Percentuale effettiva del fondo in base all'importo (art.5 comma 1).</td>
                        <td>{{ $project->percentuale_fondo }}</td>
                        <td>{{ $project->importo_effettivo_fondo }} €</td>
                    </tr>
                    <tr class="h-10">
                        <td>Fondo per l'innovazione</td>
                        <td>20</td>
                        <td>{{ $project->componente_innovazione }} €</td>
                    </tr>
                    <tr class="h-10">
                        <td>Componente Incentivante (art.4 comma 2)</td>
                        <td>80</td>
                        <td>{{ $project->componente_incentivante }} €</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <br>

        <div class="pt-4">
            <table class="w-full table-auto text-sm border-separate border border-slate-400">
                <thead class="border-b-2">
                    <tr class="h-10 text-left">
                        <th>Macroattività</th>
                        <th class="pr-4">%</th>
                        <th class="pr-2">Importo</th>
                        <th>Anno competenza</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project->activities as $activity)
                        <tr class="h-10">
                            <td>{{ $activity->nome }}</td>
                            <td>{{ $activity->quota_percentuale }}</td>
                            <td>{{ $activity->importo }} €</td>
                            <td>{{ $activity->anno_competenza }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <br><br><br>

        @pageBreak

        <p class="text-2xl font-medium"> <strong> FASE AGGIUDICAZIONE </strong> </p>
        <div class="pt-4">
            @foreach ($project->activities as $activity)
                <table class="w-full table-auto text-sm border-separate border border-slate-400">
                    <h1 class="caption-top">
                        <strong>{{ $activity->nome }}</strong>
                    </h1>

                    <thead class="border-b-2">
                        <tr class="h-10 text-left">
                            <th>Matricola</th>
                            <th class="pr-4">Cognome</th>
                            <th class="pr-2">Nome</th>
                            <th class="pr-2">Percentuale</th>
                            <th>Importo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activity->employees as $employee)
                            <tr class="h-10">
                                <td>{{ $employee->matricola }}</td>
                                <td>{{ $employee->cognome }}</td>
                                <td>{{ $employee->nome }}</td>
                                <td>{{ $employee->pivot->percentuale_attivita_dipendente }} %</td>
                                <td>{{ $employee->pivot->importo_attivita_dipendente }} €</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
            @endforeach
        </div>

        @pageBreak

        {{-- <p class="text-2xl font-medium"> <strong> TOTALI DA LIQUIDARE - Fase di aggiudicazione </strong> </p>
        <div class="pt-4">
            @foreach ($liquidazione as $employee => $content)
                <table class="w-full table-auto text-sm border-separate border border-slate-400">

                    <thead class="border-b-2">
                        <tr class="h-10 text-left">
                            <th>Matricola</th>
                            <th class="pr-4">Cognome</th>
                            <th class="pr-2">Nome</th>

                            @foreach ($content['years'] as $year)
                                <th class="pr-2"> Anno {{ $year['year'] }} </th>
                            @endforeach

                            <th>Totale</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td> {{ $content['employee']->matricola }} </td>
                        <td> {{ $content['employee']->cognome }} </td>
                        <td> {{ $content['employee']->nome }} </td>
                        @foreach ($content['years'] as $year)
                            <td> {{ $year['total'] }} €</td>
                        @endforeach
                        <td> {{ $content['totale'] }} €</td>
                    </tbody>
                </table>
                <br>
            @endforeach
        </div> --}}



        <div class="pt-16 text-sm">
            <p class="font-bold"> <strong> Settore {{ $project->settore }} </strong> </p>
            <p>Responsabile del Procedimento: {{ $rup }} </p>
            <p>Via cal di Breda, 116 - 31100 Treviso- P.IVA 01138380264 C.F. 80008870265 </p>
            {{-- <p>Tel. +39 0422 656340 - fabbricati@provincia.treviso.it </p> --}}
            <p>PEC: protocollo.provincia.treviso@pecveneto.it - www.provincia.treviso.it </p>
        </div>
    </div>

</body>

</html>
