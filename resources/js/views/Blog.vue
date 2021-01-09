<template>
    <div>
        <v-card v-if="blog.id">
            <v-img
                :src="blog.image"
                class="white--text"
                height="250px"
            >
                <v-card-title
                    class="fill-height align-end"
                    v-text="blog.title"
                >
                </v-card-title>
            </v-img>
            <v-card-text>
                <v-simple-table dense>
                    <tbody>
                        <tr>
                            <td>
                                Description: 
                                <br>
                                <br>
                            {{ blog.description }}
                            </td>
                        </tr>
                    </tbody>
                </v-simple-table>
            </v-card-text> 
                
        </v-card>
    </div>
</template>
<script>
    import { mapMutations, mapActions } from 'vuex'
    export default {
        data: () => ({
            blog: {},
        }),
        created() {
            this.go()   
        },
        methods: {
            go() {
                let { id } = this.$route.params
                let url = '/api/blog/'+id
                axios.get(url)
                .then((response) => {
                    let { data } = response.data
                    this.blog = data.blog
                })
                .catch((error) => {
                    let { responses } = error
                    console.log(responses)
                })
            }
        },
    };
</script>