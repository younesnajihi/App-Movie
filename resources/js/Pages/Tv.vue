<template lang="">
    <Head title="Tv Show" />
    <div class="relative  min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0 text-white font-sans">
        <NavBar></NavBar>
        <div class="container mx-auto px-4 pt-16">
            <div class="popular-movies" >
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Movies</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8" >
                   <div v-for="tvpopular in tvpopulars" v-bind:key='tvpopular.id'>
                    <div class="mt-8">
                        <BreezeNavLink :href="route('show.tv',tvpopular.id)">
                            <img :src="'https://image.tmdb.org/t/p/w500/'+tvpopular['poster_path']" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                        </BreezeNavLink>
                        <div class="mt-2">
                            <Link :href="route('show.tv',tvpopular.id)" class="text-lg mt-2 hover:text-gray-300">{{ tvpopular['name'] }}</Link>
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                                <span class="ml-1">{{ tvpopular['vote_average']* 10}} %</span>
                                <span class="mx-2">|</span>
                                <span>{{ tvpopular['release_date'] }}</span>
                            </div>
                            <div class="text-gray-400 text-sm">
                                <div v-for="genre in tvpopular.genre_ids">
                                    <div v-for="(g , index) in this.genres">
                                       <div v-if="genre == index">
                                        {{ g }}
                                       </div>
                                    </div>
                                   
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
    
                </div>
            </div> <!-- end pouplar-tv -->

            <div class="now-playing-movies py-24">
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Now Playing</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    <div v-for="tvTopReated in tvTopReated" v-bind:key='tvTopReated.id'>
                        <div class="mt-8">
                            <a href="">
                                <img :src="'https://image.tmdb.org/t/p/w500/'+tvTopReated['poster_path']" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <Link :href="route('show.movie',tvTopReated.id)" class="text-lg mt-2 hover:text-gray-300">{{ tvTopReated['name'] }}</Link>
                                <div class="flex items-center text-gray-400 text-sm mt-1">
                                    <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                                    <span class="ml-1">{{ tvTopReated['vote_average']* 10}} %</span>
                                    <span class="mx-2">|</span>
                                    <span>{{ tvTopReated['release_date'] }}</span>
                                </div>
                                <div class="text-gray-400 text-sm">
                                    <div v-for="genre in tvTopReated.genre_ids">
                                        <div v-for="(g , index) in this.genres">
                                           <div v-if="genre == index">
                                            {{ g }}
                                           </div>
                                        </div>
                                       
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end now-playing-movies -->
        </div>
        </div>
</template>
<script>
    import {
        Head,
        Link
    } from '@inertiajs/inertia-vue3';
    import NavBar from '@/Layouts/NavBar.vue';
    import BreezeNavLink from '@/Components/NavLink.vue'

    export default {
        components: {
            NavBar,
            Head,
            Link,
            BreezeNavLink
        },

        props: ['tvpopulars', 'tvTopReated', 'genres']
    }
</script>
<style lang="">

</style>