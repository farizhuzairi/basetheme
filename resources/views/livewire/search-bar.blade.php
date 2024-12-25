<div class="hidden md:inline-block relative z-50" x-data="{ sBar: false }">
@if($container)
<button type="button" x-on:click="sBar = ! sBar" :class="sBar ? 'text-cyan-800' : ''"><span class="hascha-search2"></span></button>
<div class="absolute right-0 bg-c-theme outline outline-offset-2 outline-1 outline-c-theme px-3 py-2 rounded shadow-lg" x-show="sBar" x-cloak x-transition x-on:click.away="sBar = false">
    <x-base::form>
        <label for="searchBar" class="px-2 py-1 rounded flex justify-between gap-2 items-center min-w-[300px]">
            <input type="text" name="search_bar" id="searchBar" placeholder="cari dan temukan ..." class="bg-transparent p-0 border-0 text-c-light-thick focus:text-c-light focus:border-0 active:border-0 ring-0 active:ring-0 focus:ring-0 font-primary text-base placeholder:text-c-light focus:placeholder:text-c-light-thick w-full">
            <span class="hascha-search text-c-light"></span>
        </label>
    </x-base::form>
</div>
@endif
</div>