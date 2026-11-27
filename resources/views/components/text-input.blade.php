@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-neutral-700 bg-black text-white focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm']) }}>