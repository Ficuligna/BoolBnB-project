@extends('layouts.mainLayout')
@section('content')
    @include('components.header_generic')
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>
<h1 class="text-center">Statistiche appartamento</h1>
<div class="container-fluid content">
  <div class="row mx-3">

    <div class="contenitore_statistiche col-6 my-5">
      <div class="statistics">
        <h2 class="blu text-center">Visualizzazioni</h2>
        <canvas id="views"></canvas>
        <script type="text/javascript">
          var list_of_views = <?php echo json_encode($list_of_views)?>;
          // document.write(list_of_months);
        </script>
      </div>
        </div>
      <div class="statistics col-6  my-5">
        <h2 class="blu text-center">Messaggi ricevuti</h2>
        <canvas id="messages"></canvas>
        <script type="text/javascript">
          var list_of_messages = <?php echo json_encode($list_of_messages)?>;
          // document.write(list_of_months);
        </script>
      </div>
  </div>
</div>
@endsection
