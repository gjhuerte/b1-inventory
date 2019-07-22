
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
    
    <div class="form-group">
        <label for="name">Name</label>
        <input
            type="text"
            id="name"
            class="form-control"
            placeholder="T-Shirt"
            name="name"
            value="{{ $product->name ?? old('code') }}"
            required />
    </div>
    
    <div class="form-group">
        <label for="description">Description</label>
        
        <textarea
            name="description"
            id="description"
            class="form-control"
            rows="4"
            required
            placeholder="Fabric converted into magical clothes">{{ $product->description ?? old('description') }}</textarea>
    </div>
    