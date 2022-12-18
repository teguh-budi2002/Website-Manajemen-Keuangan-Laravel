@extends('app')
@section('container')
<div class="flex justify-center mt-32">
  <div class="w-2/3 bg-white shadow-md p-3">
    <div class="header_text flex items-center space-x-2 border-b pb-3 mb-3">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mr-2 text-gray-400">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
      </svg>
      <p class="text-xl font-semibold text-gray-400">LAPORAN UANG Keluar</p>
    </div>
    <div class="table_section">
      <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        No
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Kategori
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Status
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Nominal
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Keterangan
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Tanggal
                    </th>
                </tr>
            </thead>
            <tbody>
              @if ($reports->count())
                @foreach ($reports as $report)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6">
                        {{ $loop->iteration }}
                    </td>
                    <td class="py-4 px-6">
                      {{ $report->category->name_category }}
                    </td>
                    <td class="py-4 px-6">
                      <div class="bg-gray-200 p-2 rounded text-center">{{ $report->status }}</div>
                    </td>
                    <td class="py-4 px-6">
                      Rp. {{ number_format($report->balance_report, 2) }}
                    </td>
                    <td class="py-4 px-6">
                      {{ $report->description_report === NULL ? "Tidak Ada Keterangan" : $report->description_report }}
                    </td>
                    <td class="py-4 px-6">
                      {{ $report->created_at->format("d-F-Y") }}
                    </td>
                </tr>
                @endforeach
              @else
                <p class="text-center text-xl font-semibold text-gray-400 uppercase">Belum Ada Laporan Uang Keluar</p>
              @endif
            </tbody>
        </table>
    </div>
  </div>

  </div>
</div>
@endsection