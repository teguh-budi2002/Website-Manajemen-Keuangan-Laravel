@extends('app')
@section('container')
<style>
    .box_container::before {
        content: "";
        position: absolute;
        top: -160px;
        width: 100%;
        min-height: 200px;
        background-color: rgb(139 92 246);
        z-index: -2;
    }

</style>
<div class="w-full h-full container_balance">
    <div class="box_container relative w-full flex justify-evenly mt-28">
        <div class="w-3/12 bg-white roundeed p-2 space-y-4 shadow-md">
            <div class="header border-b-2 border-gray-300 pb-2 flex justify-between items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-10 h-10 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="uppercase font-semibold text-xl text-gray-400">saldo</p>
            </div>
            <div class="body flex justify-end items-center space-x-2">
                <p class="font-semibold text-xl text-gray-400">
                   Rp. {{ $balances !== NULL ? number_format($balances, 2) : "0"}}
                    <span>IDR</span></p>
            </div>
        </div>
        <div class="w-3/12 bg-white rounded p-2">
          <div class="header_text flex items-center justify-between text-gray-400 space-x-2 border-b-2 pt-2 pb-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3" />
            </svg>
            <p class="font-semibold text-xl">SALDO BULAN INI</p>
          </div>
          <div class="value_balance flex items-center justify-end mt-5">
            <p class="text-gray-400 text-xl font-semibold">Rp. {{ number_format($month_balance, 2) }}</p>
          </div>
        </div>
        <div class="w-3/12 bg-white roundeed p-2">
            <div class="member_count w-full flex justify-start items-center space-x-2 border-b-2 pt-2 pb-3 text-gray-400 font-semibold">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
              </svg>
              <span class="font-semibold text-xl">KARYAWAN</span>
            </div>
            <div class="value flex justify-end mt-3">
              <p class="text-gray-400 text-4xl font-semibold">{{ $members }}</p>
            </div>
        </div>
    </div>
    @if ($mess = Session::get('success'))
    <div class="w-full">
        <div class="w-2/3 mt-4 mx-auto rounded text-center p-2 bg-green-500 text-white">
            <p class="uppercase">{{ $mess }}</p>
        </div>
    </div>
    @elseif ($mess = Session::get('success-cashout'))
    <div class="w-full">
        <div class="w-2/3 mt-4 mx-auto rounded text-center p-2 bg-green-500 text-white">
            <p class="uppercase">{{ $mess }}</p>
        </div>
    </div>
    @endif
    <div class="chart_section w-3/4 bg-white p-2 shadow-lg rounded-lg overflow-hidden mt-8 mb-8 mx-auto">
      <div class="text_header">
        <p class="uppercase text-xl font-semibold text-gray-500 text-center mt-4 mb-2">LAPorAN DATA KEUANGAN (Hanya Tampilan Saja)</p>
      </div>
      <canvas class="p-10" id="chartLine"></canvas>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.2.min.js"
    integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "get-balance",
            success: function (response) {
                console.log(response.data.category.id)
                $("#balance").val(response.data.balance)
                $("#cat_id").val(response.data.category.id)
            }
        });
    });

    const labels = ["January", "February", "March", "April", "May", "June"];
  const data = {
    labels: labels,
    datasets: [
      {
        label: "Data Money Management",
        backgroundColor: "hsl(252, 82.9%, 67.8%)",
        borderColor: "hsl(252, 82.9%, 67.8%)",
        data: [0, 10, 5, 2, 20, 30, 45],
      },
    ],
  };

  const configLineChart = {
    type: "line",
    data,
    options: {},
  };

  var chartLine = new Chart(
    document.getElementById("chartLine"),
    configLineChart
  );
</script>
@endsection
