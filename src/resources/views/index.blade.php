<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>Working App</title>
</head>
<body>
<section>

    <h1>İşlerin tamamlanma süresi: {{ $plan['weeks'] }} hafta + {{ $plan['hours'] }} saat</h1>
    <table id="plan" class="table cell-border compact stripe hover">
        <thead>
        <tr>
            <th scope="col">Geliştirici</th>
            <th scope="col">İşveren</th>
            <th scope="col">İş</th>
            <th scope="col">Zorluk Derecesi</th>
            <th scope="col">Tahmini Bitiş Saati</th>
        </tr>
        </thead>
        <tbody>
        @foreach($schedules as $developer => $tasks)

            @foreach($tasks as $task)
                <tr>
                    <th scope="row">{{ $developer }}</th>
                    <td>{{ \App\Models\Provider::find($task['provider_id'])->name }}</td>
                    <td>{{ $task['name'] }}</td>
                    <td>{{ $task['level'] }}</td>
                    <td>{{ $task['estimated_duration'] }}</td>
                </tr>
            @endforeach
        @endforeach

        </tbody>
    </table>
    <hr>
    <h1>Geliştirici bulunamayan işler</h1>
    <table id="wasted" class="table cell-border compact stripe hover">
        <thead>
        <tr>
            <th scope="col">İşveren</th>
            <th scope="col">İş</th>
            <th scope="col">Zorluk Derecesi</th>
            <th scope="col">Tahmini Bitiş Saati</th>
        </tr>
        </thead>
        <tbody>
        @foreach($wastedTasks as $wastedTask)

            <tr>
                <td scope="row">{{ \App\Models\Provider::find($task['provider_id'])->name }}</td>
                <td>{{ $task['name'] }}</td>
                <td>{{ $task['level'] }}</td>
                <td>{{ $task['estimated_duration'] }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
</section>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<!-- Datatables -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#plan').DataTable();
        $('#wasted').DataTable();
    });
</script>

</body>
</html>
