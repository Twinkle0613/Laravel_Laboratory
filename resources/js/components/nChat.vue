<template>
<div>
    <b-card no-body>
        <b-card-body :style="{ 'min-height':'80vh','padding':'0px'}">

            <b-row :style="{'width':'100%','margin':'0px' }">
                <b-col md="3" :style="{
                    'height':'80vh',
                    'padding':'0px',
                    'background-color':'rgb(40, 50, 70)'
                    }">
                    <b-card-header header="Chat Box" :style="{'height':'8%','background-color':'rgb(30, 30, 30)','color':'white','border-right':'1px solid rgb(60, 60, 60)'}"></b-card-header>
                    <div>
                        <v-select
                            class="style-chooser"
                            label="name"
                            placeholder="Search"
                            />
                    </div>
                    <contacts-list/>
                </b-col>
                <b-col :style="{
                    'height':'80vh',
                    'padding':'0px',
                    'background-size': 'cover',
                    'background-image':'url(/bower_components/admin-lte/dist/img/chatbox_background_dark.jpg)',
                    }">
                    <b-card-header :style="{'height':'8%','background-color':'rgb(30, 30, 30)'}">
                        <img class="contacts-list-img" src="/bower_components/admin-lte/dist/img/user1-128x128.jpg" :style="{'width':'30px'}">
                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                                Sarah Doe
                            </span>
                        </div>
                    </b-card-header>
                    <div class="direct-chat-messages" :style="{
                    'min-height':'83%',
                    }">
                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left">Alexander Pierce</span>
                                <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                Is this template really for free? That's unbelievable!
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-right">Sarah Bullock</span>
                                <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                You better believe it!
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left">Alexander Pierce</span>
                                <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                Working with AdminLTE on a great new app! Wanna join?
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-right">Sarah Bullock</span>
                                <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                I would love to.
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                    </div>

                    <div class="card-footer">
                        <form action="#" method="post">
                            <div class="input-group">
                                <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-primary">Send</button>
                                </span>
                            </div>
                        </form>
                    </div>

                </b-col>

            </b-row>
        </b-card-body>

    </b-card>

</div>
</template>

<script>
import ContactsList  from './nContactsList';

export default {
    components:{ContactsList},
    data() {
        return {
            contacts:[],
        }
    },
    created() {
    },
    mounted() {
     this.$http.get('chat-contacts').then(response => {
        var data = response.data.data;
        console.log(data);
      });
    },
}
</script>
