<div>

    <section id="details">

        {{-- Tabs list --}}
       @include('livewire.client.product.tabsList')
        <!-- introduction -->
        @include('livewire.client.product.tabs1')
        <!-- reviews -->
        @include('livewire.client.product.tabs2')

        {{-- question --}}

        @include('livewire.client.product.tabsQuestion')


        <!-- details -->
      @include('livewire.client.product.tabs3')
        <!-- comments -->
       @include('livewire.client.product.tabs4')


    </section>

</div>

