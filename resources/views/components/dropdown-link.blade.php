@props(['as' => 'Link'])

<{{ $as }} {{ $attributes->class('block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out dark:bg-gray-900 hover:bg-gray-700 focus:bg-gray-700 dark:text-white') }}>{{ $slot }}</{{ $as }}>
