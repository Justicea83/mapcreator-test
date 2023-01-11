<div class="border-t border-gray-200 pt-4 pb-3">
    <div class="flex items-center px-4">
        <div class="flex-shrink-0">
            <img wire:click="toggleShowActions" class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
        </div>
        <div class="ml-3">
            <div class="text-base font-medium text-gray-800">{{ auth()->user()->name }}</div>
            <div class="text-sm font-medium text-gray-500">{{ auth()->user()->email }}</div>
        </div>
    </div>
    <div class="mt-3 space-y-1 {{!$showActions ? 'hidden' : 'block'}}">
        <a href="#" class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800">Sign out</a>
    </div>
</div>
