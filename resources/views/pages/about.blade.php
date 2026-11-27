<x-app-layout>
    <div class="py-12 bg-black min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-900 border border-yellow-500 rounded-lg p-8 shadow-lg">
                <h2 class="text-3xl font-black text-yellow-500 mb-6 uppercase">О компании "Делай Сам"</h2>
                <div class="prose prose-invert max-w-none text-gray-300 leading-relaxed">
                    {!! nl2br(e($aboutText)) !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>