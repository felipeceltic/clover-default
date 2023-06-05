<x-header />
@php
    use Carbon\Carbon;
@endphp
<main class="min-h-screen bg-slate-900 z-20 py-20">
    <div class="min-h-screen md:grid gap-0 md:grid-cols-2">
        <div
            class="flex flex-col min-h-screen m-16 text-white bg-red-900 hover:bg-red-700 rounded-3xl border-2 border-red-700 transition-all">
            <div class="w-full">
              <h1 class="text-center mt-4">Selecione o periodo desejado</h1>
                <form class="px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('reports.expense') }}">
                    @csrf
                    <div class="md:grid gap-2 md:grid-cols-2">
                        <div class="flex flex-col mb-4">
                          <input type="hidden" name="datainicialreceitas" value="{{$startDateIncomes}}">
                          <input type="hidden" name="datafinalreceitas" value="{{$endDateIncomes}}">
                            <label class="block text-gray-50 text-sm my-2" for="datainicialdespesas">
                                Data Inicial
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="datainicial" type="date" name="datainicialdespesas" value="{{ $startDateExpenses }}" required>
                        </div>
                        <div class="flex flex-col mb-4">
                            <label class="block text-gray-50 text-sm my-2" for="datafinaldespesas">
                                Data Final
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="datafinal" type="date" name="datafinaldespesas" value="{{ $endDateExpenses }}" required>
                        </div>
                    </div>
                    <div class="flex items-center justify-center">
                        <button
                            class="bg-blue-700 hover:bg-blue-900 text-gray-50 py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Atualizar
                        </button>
                    </div>
                </form>
            </div>
            <div class="w-full">
                <h1 class="mt-4 text-center">Total de despesas</h1>
                <ul role="list" class="divide-y divide-gray-100 px-4">
                    <li class="py-2 rounded-lg px-4 bg-slate-900 my-2">
                        <h4 class="text-slate-100 text-center">R${{ $totalExpense }}</h4>
                    </li>
                </ul>
            </div>
        </div>
        <div
            class="flex flex-col min-h-screen m-16 text-white bg-green-900 hover:bg-green-700 border-2 border-green-700 rounded-3xl transition-all">
            <div class="w-full">
              <h1 class="text-center mt-4">Selecione o periodo desejado</h1>
                <form class="px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('reports.income') }}">
                    @csrf
                    <div class="md:grid gap-0 md:grid-cols-2">
                        <div class="flex flex-col mb-4">
                          <input type="hidden" name="datainicialdespesas" value="{{$startDateExpenses}}">
                          <input type="hidden" name="datafinaldespesas" value="{{$endDateExpenses}}">
                            <label class="block text-gray-50 text-sm my-2" for="datainicialreceitas">
                                Data Inicial
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="datainicial" type="date" name="datainicialreceitas" value="{{ $startDateIncomes }}" required>
                        </div>
                        <div class="flex flex-col mb-4">
                            <label class="block text-gray-50 text-sm my-2" for="datafinalreceitas">
                                Data Final
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="datafinal" type="date" name="datafinalreceitas" value="{{ $endDateIncomes }}" required>
                        </div>
                    </div>
                    <div class="flex items-center justify-center">
                        <button
                            class="bg-blue-700 hover:bg-blue-900 text-gray-50 py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Atualizar
                        </button>
                    </div>
                </form>
            </div>
            <div class="w-full">
              <h1 class="mt-4 text-center">Total de receitas</h1>
              <ul role="list" class="divide-y divide-gray-100 px-4">
                  <li class="py-2 rounded-lg px-4 bg-slate-900 my-2">
                      <h4 class="text-slate-100 text-center">R${{ $totalIncome }}</h4>
                  </li>
              </ul>
            </div>
        </div>
    </div>
</main>
<x-footer />
