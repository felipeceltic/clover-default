<x-header />
@php
use Carbon\Carbon;
@endphp
<main class="min-h-screen bg-slate-900 z-20 py-20">
    <div class="min-h-screen md:grid gap-0 md:grid-cols-2">
        <div
            class="flex flex-col min-h-screen m-16 text-white bg-red-900 hover:bg-red-700 rounded-3xl border-2 border-red-700 transition-all">
            <div class="w-full">
                <form class="px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('finance.expense.store') }}">
                  @csrf
                    <div class="mb-4">

                        <label class="block text-gray-50 text-sm mb-2" for="descricaodespesa">
                          Descriçao da despesa
                        </label>
                        <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="descricaodespesa" type="text" placeholder="Nome da despesa" name="descricaodespesa" required>
                        <div class="grid grid-cols-2">
                          <label class="text-gray-50 text-sm my-2" for="valordespesa">
                              Valor da despesa
                          </label>
                          <label class="text-gray-50 text-sm my-2" for="repetedespesa">
                            Quantidade de parcelas
                          </label>
                          <input
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              id="valordespesa" type="number" step="0.01" placeholder="R$ 99.99" name="valordespesa" required>
                        
                          <input
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              id="repetedespesa" type="number" step="1" placeholder="6" name="repetedespesa" value="1" required>
                        </div>
                        <label class="block text-gray-50 text-sm my-2" for="datadespesa">
                          Data de vencimento
                        </label>
                        <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="datadespesa" type="date" name="datadespesa" required>
                    </div>
                    <div class="flex items-center justify-end">
                        <button
                            class="bg-blue-700 hover:bg-blue-900 text-gray-50 py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
            <div class="w-full">
              <h2 class="ms-4">Ultimas inserções</h2>
              
                @foreach ($expense as $e)
                <ul role="list" class="divide-y divide-gray-100 px-4">
                  @if (Carbon::now()->diffInDays(Carbon::parse($e->date)) < 6)
                  <li class="flex justify-between gap-x-6 py-2 rounded-lg px-4 bg-yellow-600 my-2">
                  @else
                  <li class="flex justify-between gap-x-6 py-2 rounded-lg px-4 bg-slate-900 my-2">  
                  @endif
                    <div class="flex gap-x-4">                      
                      <div class="min-w-0 flex-auto">
                        <h4 class="leading-6 text-slate-100">Descrição: {{$e->description}}</h4>
                        <h4 class="mt-1 leading-6 text-slate-100">Valor: {{$e->value}}</h4>
                      </div>
                    </div>
                    <div class="hidden sm:flex sm:flex-col sm:items-end">
                      <p class="text-sm leading-6 text-slate-100">Data de vencimento <time>{{Carbon::parse($e->date)->format('d/m/Y')}}</time></p>
                      <p class="mt-1 text-xs leading-5 text-slate-100">incluído em <time>{{Carbon::parse($e->created_at)->format('d/m/Y \à\s H:i:s')}}</time></p>
                    </div>
                  </li>
                </ul>
                @endforeach              
            </div>
        </div>
        <div
            class="flex flex-col min-h-screen m-16 text-white bg-green-900 hover:bg-green-700 border-2 border-green-700 rounded-3xl transition-all">
            <div class="w-full">
                <form class="px-8 pt-6 pb-8 mb-4"  method="POST" action="{{ route('finance.income.store') }}">
                  @csrf
                    <div class="mb-4">
                      <label class="block text-gray-50 text-sm mb-2" for="descricaoreceita">
                        Descriçao da receita
                      </label>
                      <input
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="descricaoreceita" type="text" placeholder="Nome da receita" name="descricaoreceita" required>

                      <label class="block text-gray-50 text-sm my-2" for="valorreceita">
                          Valor da receita
                      </label>
                      <input
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                          id="valorreceita" type="number" step="0.01" placeholder="R$ 99.99" name="valorreceita" required>
                      
                      <label class="block text-gray-50 text-sm my-2" for="datareceita">
                        Data da receita
                      </label>
                      <input
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="datareceita" type="date" name="datareceita" required>
                  </div>
                    <div class="flex items-center justify-end">
                        <button
                            class="bg-blue-700 hover:bg-blue-900 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
            <div class="w-full">
              <h2 class="ms-4">Ultimas inserções</h2>
              
                @foreach ($income as $i)
                <ul role="list" class="divide-y divide-gray-100 px-4">
                  <li class="flex justify-between gap-x-6 py-2 rounded-lg px-4 bg-slate-900 my-2">
                    <div class="flex gap-x-4">                      
                      <div class="min-w-0 flex-auto">
                        <h4 class="leading-6 text-slate-100">Descrição: {{$i->description}}</h4>
                        <h4 class="mt-1 leading-6 text-slate-100">Valor: {{$i->value}}</h4>
                      </div>
                    </div>
                    <div class="hidden sm:flex sm:flex-col sm:items-end">
                      <p class="text-sm leading-6 text-slate-100">Data da receita <time>{{Carbon::parse($i->date)->format('d/m/Y')}}</time></p>
                      <p class="mt-1 text-xs leading-5 text-slate-100">incluído em <time>{{Carbon::parse($i->created_at)->format('d/m/Y \à\s H:i:s')}}</time></p>
                    </div>
                  </li>
                </ul>
                @endforeach              
            </div>
        </div>
    </div>
</main>
<x-footer />
