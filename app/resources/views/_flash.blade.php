<div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
    @if (session()->has('success'))
        <div class="p-3 text-green-700 bg-green-300 rounded">
            {{ session()->get('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="p-3 text-red-700 bg-red-300 rounded">
            {{ session()->get('error') }}
        </div>
    @endif
</div>
