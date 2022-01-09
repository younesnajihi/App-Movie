<template lang="">
    
    <div class="relative  min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0 text-white font-sans">
       <NavBar></NavBar>
<div class="container mx-auto px-4 pt-16">
         <div class="popular-movies" >
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Actors</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8" >
               <div v-for="popularActor in popularActors" v-bind:key='popularActor.id'>
                <div class="mt-8">
                    <BreezeNavLink :href="route('show.actor',popularActor.id)">
                        <img :src="'https://image.tmdb.org/t/p/w500/'+popularActor['profile_path']" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                    </BreezeNavLink>
                    <div class="mt-2">
                        <Link :href="route('show.actor',popularActor.id)" class="text-lg mt-2 hover:text-gray-300">{{ popularActor['name'] }}</Link>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <Link :href="route('show.actor',popularActor.id)"><span class="ml-1">{{ popularActor['name']}} </span></Link>
                            <span class="mx-2">|</span>
                            <span class="ml-1">{{ popularActor['popularity']}} </span>
                             
                        </div>
                       
                    </div>
                </div>
            </div>

            </div>
        </div> <!-- end pouplar-movies -->
        </div>
    </div>
</template>
<script>
    import NavBar from '@/Layouts/NavBar.vue';
    import {
        Link
    } from '@inertiajs/inertia-vue3';
    export default {

        components: {
            NavBar,
            Link
        },
        props: ['popularActors']
    }
</script>
<style lang="">

</style>