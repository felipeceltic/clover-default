<x-header />
<main class="min-h-screen bg-slate-900 z-20 py-20">
    <div class="min-h-screen md:grid gap-0 md:grid-cols-2">
        <div
            class="flex flex-col min-h-screen m-16 text-white bg-red-900 hover:bg-red-700 rounded-3xl border-2 border-red-700 transition-all">
            <div class="w-full">
                <form class="px-8 pt-6 pb-8 mb-4" method="POST" {{ route('finance.store') }}>
                  @csrf
                    <div class="mb-4">

                        <label class="block text-gray-50 text-sm mb-2" for="descricaodespesa">
                          Descriçao da despesa
                        </label>
                        <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="descricaodespesa" type="text" placeholder="Nome da despesa" name="descricaodespesa" required>

                        <label class="block text-gray-50 text-sm my-2" for="valordespesa">
                            Valor da despesa
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="valordespesa" type="number" step="0.01" placeholder="R$ 99.99" name="valordespesa" required>
                        
                        <label class="block text-gray-50 text-sm my-2" for="datadespesa">
                          Data da despesa
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
                  <li class="flex justify-between gap-x-6 py-2 rounded-lg px-4 bg-slate-900 my-2">
                    <div class="flex gap-x-4">                      
                      <div class="min-w-0 flex-auto">
                        <h4 class="leading-6 text-slate-100">Descrição: {{$e->description}}</h4>
                        <h4 class="mt-1 leading-6 text-slate-100">Valor: {{$e->value}}</h4>
                      </div>
                    </div>
                    <div class="hidden sm:flex sm:flex-col sm:items-end">
                      <p class="text-sm leading-6 text-slate-100">Data da despesa <time datetime="2023-01-23T13:23Z">{{$e->date}}</time></p>
                      <p class="mt-1 text-xs leading-5 text-slate-100">incluído em <time datetime="2023-01-23T13:23Z">{{$e->created_at}}</time></p>
                    </div>
                  </li>
                </ul>
                @endforeach              
            </div>
        </div>
        <div
            class="flex flex-col min-h-screen m-16 text-white bg-green-900 hover:bg-green-700 border-2 border-green-700 rounded-3xl transition-all">
            <div class="w-full">
                <form class="px-8 pt-6 pb-8 mb-4">
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
        </div>
    </div>
</main>
<x-footer />
