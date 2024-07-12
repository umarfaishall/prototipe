<button
  {{ $attributes->merge(['type' => 'submit', 'class' => 'text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ease-in duration-150']) }}>
  {{ $slot }}
</button>
