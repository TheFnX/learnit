<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-success inline-flex items-center px-4 py-2 border border-transparent font-semibold text-xs uppercase tracking-widest focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
