@extends('app')
@section('container')
<div class="flex justify-center mt-32">
  <div class="w-2/3 bg-white shadow-md p-3">
    <div class="header_text flex items-center space-x-2 border-b pb-3 mb-3">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mr-2 text-gray-400">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
      </svg>
      <p class="text-xl font-semibold text-gray-400">LAPORAN UANG MASUK</p>
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
                <p class="text-center text-xl font-semibold text-red-500 uppercase mb-5">Belum Ada Laporan Uang Masuk</p>
              @endif
            </tbody>
        </table>
    </div>
  </div>

  </div>
</div>
@endsection