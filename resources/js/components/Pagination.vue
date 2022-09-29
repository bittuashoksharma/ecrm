





<template>
   <!--  <nav class="ml-auto">
                       <ul class="pagination pagination-sm mb-0">
                          <li class="page-item" :class="{disabled : pagination.prev_page_url == null}">
                             <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item active" aria-current="page">
                             <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                             <a class="page-link" href="#">Next</a>
                          </li>
                       </ul>
                    </nav> -->
        <nav class="ml-auto">
           <ul class="pagination pagination-sm mb-0">
                <li class="page-item" :class="{disabled : pagination.prev_page_url == null}">
                    <button class="page-link" @click="pageURL(pagination.first_page_url)" type="button">&laquo;</button>
                </li>
                <li class="page-item" :class="{disabled : pagination.prev_page_url == null}">
                    <button class="page-link" @click="pageURL(pagination.prev_page_url)" type="button">Previous</button>
                </li>
                <li class="page-item" v-if="current_page -2 > 0 " >
                    <button class="page-link" @click="pageURL(pagination.path + '?page=' + (current_page - 2 ) )" type="button">{{ current_page - 2}}</button>
                </li>
                <li class="page-item" v-if="pagination.prev_page_url" >
                    <button class="page-link" @click="pageURL(pagination.prev_page_url)" type="button">{{ current_page - 1}}</button>
                </li>
                <li class="page-item">
                    <button class="page-link" :class="{current : pagination.current_page == current_page}" type="button">{{ current_page}}</button>
                </li>
                <li class="page-item" v-if="pagination.next_page_url" >
                    <button class="page-link" @click="pageURL(pagination.next_page_url)" type="button">{{ current_page + 1}}</button>
                </li>
                <li class="page-item" v-if="current_page + 2 <= last_page " >
                    <button class="page-link" @click="pageURL(pagination.path + '?page=' + (current_page + 2 ) )" type="button">{{ current_page + 2 }}</button>
                </li>
                <li class="page-item" :class="{disabled : pagination.next_page_url == null}">
                    <button class="page-link" @click="pageURL(pagination.next_page_url)" type="button">Next</button>
                </li>
                <li class="page-item" :class="{disabled : pagination.next_page_url == null}">
                    <button class="page-link" @click="pageURL(pagination.last_page_url)" type="button">&raquo;</button>
                </li>

            </ul>
        </nav>
</template>

<script>
    export default {
        props: ['pagination', 'current_page', 'last_page'],
        emits: ["pageURL"],
        methods: {
            pageURL(url) {
                console.log(url)
                this.$emit('pageURL', url);
            }
        },
        

    };
</script>
