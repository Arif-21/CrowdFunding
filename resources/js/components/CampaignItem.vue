<template>
    <div>
        <v-card :to="'/campaign/'+campaign.id">
            <v-img
                :src="campaign.image"
                class="white--text"
                height="200px"
            >
                <v-card-title
                    v-text="campaign.title"
                    class="fill-height align-end"
                >
                </v-card-title>
            </v-img>

            <v-card-actions>
                <v-progress-linear
                    v-model="progress"
                    color="blue-grey"
                    heigth="7"
                >
                </v-progress-linear>
            </v-card-actions>
            
            <v-card-actions>
                <v-icon>mdi-cash-multiple</v-icon>
                <span>Rp {{ campaign.required.toLocaleString('id-ID') }}</span>
                <v-spacer></v-spacer>
                <span>{{ progress }}%</span>
            </v-card-actions>
        </v-card>
    </div>
</template>
<script>
    export default {
        name: 'campaign-item',
        props: ['campaign'],
        computed: {
            progress() {
                return(this.campaign.collected / this.campaign.required * 100)
            },
        },
    }
</script>