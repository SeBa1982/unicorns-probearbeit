<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Unicorns') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Bestelldatum</th>
                        <th scope="col">Auftragsnummer / Position</th>
                        <th scope="col">Artikel</th>
                        <th scope="col">Artikelbeschreibung</th>
                        <th scope="col">Marke</th>
                        <th scope="col">Menge</th>
                        <th scope="col">Lieferdatum</th>
                        <th scope="col">Bestellnummer</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (json_decode($orders, true) as $order)
                        <tr>
                            <th scope="row">{{ $order['bestelldatum'] }}</th>
                            <td>{{$order['an_pos']['an'] .' / '. $order['an_pos']['pos'] .' / '. $order['an_pos']['pos2']}}</td>
                            <td>{{ $order['article_id'] }}</td>
                            <td>{{ $order['article_desc'] }}</td>
                            <td>{{ $order['marke'] }}</td>
                            <td>{{ $order['menge']['pos1'] .' / '. $order['menge']['pos2'] .' / '. $order['menge']['pos3'] }}</td>
                            <td>{{ $order['lieferdatum'] }}</td>
                            <td>{{ $order['bestellnummer'] }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{ $order['id'] }}"></button>
                            </td>
                            <div class="modal fade" id="modal{{ $order['id'] }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Bearbeiten</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Artikel: {{ $order['article_id'] }}</li>
                                                <li class="list-group-item">Artikelbeschreibung: {{ $order['article_desc'] }}</li>
                                                <li class="list-group-item">Lieferdatum: {{ $order['lieferdatum'] }}</li>
                                            </ul>
                                            <form action="{{ route('update-notice', $order['id']) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="notiz" class="form-label">Notiz hinzufügen:</label>
                                                    <textarea name="notiz" id="notiz" rows="3">@php $notiz = \App\Models\Notice::where('order_id', $order['id'])->first() @endphp
                                                        @if (isset($notiz))
                                                        {{ $notiz->notiz }}
                                                        @endif
                                                    </textarea>
                                                </div>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Modal --}}

        </div>
    </body>
</html>
