@error($name)
    <p {{ $attributes->merge(['class' => 'mt-1 text-xs text-negative-500']) }}>
        {{ $message }}
    </p>
@enderror
