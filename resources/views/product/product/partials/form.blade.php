
<div class="form-group">
    <label for="code">Code</label>
    <input
        type="text"
        id="code"
        class="form-control"
        placeholder="TSH-1237"
        name="code"
        value="{{ $product->code ?? old('code') }}"
        required />
</div>
