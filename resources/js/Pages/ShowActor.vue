<template lang="">
 <Head title="Movies" />
    <div class="bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0 text-white font-sans">
        <nav-bar></nav-bar>

        <div class="movie-info border-b border-gray-800">
           <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
                <div class="flex-none">
                <img :src="'https://image.tmdb.org/t/p/w500/'+actors['profile_path']" alt="poster" class="w-64 lg:w-96">
            </div>
                <div class="md:ml-24">
                    <h2 class="text-4xl mt-4 md:mt-0 font-semibold">{{actors['name']}}</h2>
                    <div class="flex flex-wrap items-center text-gray-400 text-sm">
                   
                    <span class="ml-1">{{actors['birthday']}}</span>
                    <span class="mx-2">|</span>
                    <span>{{actors['place_of_birth']}}</span>
                    <span class="mx-2">|</span>
                    <span>{{actors['popularity']}}</span>
                    <span>
                       <!-- <div v-for="(genre ,id) in this.movie.genres">
                            {{genre.name}}
                       </div> -->
                            
                    </span>
                  </div>

                    <p class="text-gray-300 mt-8">
                        {{actors['biography']}}
                    </p>

                     <div class="mt-12">
                         <h4 class="text-white font-semibold">Know for</h4>
                            
                        <div class="flex mt-4">
                            <div v-for="(cast,index) in credits.cast">
                             
                                <div class="mr-8" v-if="index <= 4" >
                                  <img :src="'https://image.tmdb.org/t/p/w500/'+cast.poster_path" alt="poster" >
                                  <div class="text-sm text-gray-400">{{cast.title}}</div>
                               </div>
                         
                             </div>
                        </div>

                    </div>
  
                </div>
            
           </div>
        </div><!-- end movie-info -->

        <div class="movie-info border-b border-gray-800">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold">Cast</h2>

                <ul class="list-disc leading-loose pl-5 mt-8">
                   
                        <li v-for="credit in credits.cast">
                            {{ credit.release_date }} &middot;
                            <strong><a href="{{ credit.linkToPage }}" class="hover:underline">{{ credit.title }}</a></strong>
                             as {{ credit.character }}
                         </li>
                   
    
                </ul>
            </div>
        </div>

    

     

  

    </div>

</template>
<script>
    import {
        Head,
        Link
    } from '@inertiajs/inertia-vue3';
    import NavBar from '@/Layouts/NavBar.vue';
    export default {
        components: {
            Head,
            Link,
            NavBar,

        },

        props: ['actors', 'credits']
    }
</script>
<style lang="">

</style>