<template>
    <div>
        <div v-if="showModal" class="modal is-active">
            <div class="modal-background"></div>
            <div class="modal-content">
                <article class="message is-primary">
                    <div class="message-header">
                        <h5 class='title is-5 has-text-centered'>
                            <slot name="title"></slot>
                        </h5>

                        <button class="delete" aria-label="delete" @click="showModal = false"></button>
                    </div>

                    <div class="message-body">
                        <slot name="body"></slot>
                    </div>
                </article>
            </div>
        </div>

        <button class="button is-small is-primary" @click="showModal = true">Create</button>
    </div>      
</div>  
</template>

<script>
    export default {
        data () {
            return {
                showModal: false,
            }
        },
    }
</script>
