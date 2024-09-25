<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau Dashboard with JWT</title>

    <!-- Tableau JavaScript API -->
    <script type="module" src="https://public.tableau.com/javascripts/api/tableau.embedding.3.latest.min.js"></script>
</head>
<body>
<h1>Tableau Dashboard with JWT Authentication</h1>



{{--<tableau-viz id='tableau-viz' src='https://prod-uk-a.online.tableau.com/t/tes-958660f872/views/EmailPerformancebyCampaign/EmailPerformancebyCampaign' width='1920' height='845' hide-tabs toolbar='bottom' token="{{$jwtToken}}" ></tableau-viz>--}}

<tableau-viz id='tableau-viz' src='https://prod-useast-a.online.tableau.com/t/aidsservicesofdallas/views/CISGroupEvents/ofClientsbyDateCategory' width='1920' height='845' hide-tabs toolbar='bottom' token="{{$jwtToken}}" ></tableau-viz>


</body>
</html>
