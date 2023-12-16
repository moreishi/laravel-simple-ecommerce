<template>
    <v-card 
        :title="item.name"
        width="22%"
        :href="'/products/' + item.id "
        class="v-col-auto rounder-0 ma-1 pa-0" 
        v-for="(item, idx) in props.products">
        <v-img :src="item.image"></v-img>
        <v-card-text>
            <p class="text-muted">{{item.author}}</p>
            <p class="h5"><currency />{{item.price / 100}}</p>
        </v-card-text>
    </v-card>
</template>
<script setup>
import { defineProps } from 'vue';
const props = defineProps(['products'])
</script>