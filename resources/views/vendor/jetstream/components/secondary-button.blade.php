<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-green-300 rounded-md font-semibold text-xs text-green-700 uppercase tracking-widest shadow-sm hover:text-green-500 focus:outline-none focus:border-green-300 focus:ring focus:ring-green-200 active:text-green-800 active:bg-green-50 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
