{{-- @props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
 --}}

@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-2 active'
            : 'flex items-center gap-2  false text-gray-400';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

<style>
    .active{
        background:#11101d;
        border-radius: 12px;
        padding: .8rem 1rem;
        margin: 0.8rem 0;
        position: relative;
    }
    .active::before {
      position: absolute;
      content: "";
      top: 50%;
      transform: translateY(-50%);
      left: 0;
      background: #0a27d8;
      border-radius: 5px;
      height: 80%;
      width: 3px;
      transition: 0.3s ease;
    }

    .false{
      background:#11101d;
        border-radius: 12px;
        padding: .8rem 1rem;
        margin: 0.8rem 0;
        position: relative;
    }

    .active svg{
      fill: #fff;
    }

    .false svg{
      fill: #9CA3AF;
    }
</style>