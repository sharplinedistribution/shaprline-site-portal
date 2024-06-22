@extends('layouts.revamp_scaffold')
@push('title')
FAQs
@endpush
@section('content')
<section class="faqs-main-headign">
    <div class="container custom-container">
        <div class="row">
            <div class="col-12">
                <div class="our-work">
                    <h1 class="font-oswald text-color-primary mb-5">Answers to our most commonly asked questions</h1>

                    <h6 class="font-oswald text-white text-capitalize mb-3">A more detailed FAQ is available to our members within the SHARPLINE DISTRO portal. Our support team is also available to help members plan their release and answer any questions.</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="faq-list pt-0">
    <div class="container custom-container">
        <div class="row">
            <div class="col-12">
                <h5 class="font-oswald text-color-primary mb-3">Becoming a Sharpline Member</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="faqs">
                    <div class="accordion bg-transparent" id="member">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="memberOne">
                            <button class="accordion-button text-white font-oswald " type="button" data-bs-toggle="collapse" data-bs-target="#collapseMemberOne" aria-expanded="true" aria-controls="collapseMemberOne">
                                <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg> &nbsp; How do I apply to Sharpline Distro?
                            </button>
                          </h2>
                          <div id="collapseMemberOne" class="accordion-collapse collapse" aria-labelledby="memberOne" data-bs-parent="#member">
                            <div class="accordion-body">
                              <p class="text-white">Click ‘SIGN UP’ in the home page of the website and follow the steps to submit your application.</p>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="memberTwo">
                            <button class="accordion-button collapsed text-white font-oswald" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMemberTwo" aria-expanded="false" aria-controls="collapseMemberTwo">
                                <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg> &nbsp; Can I switch to Sharpline from another distributor?
                            </button>
                          </h2>
                          <div id="collapseMemberTwo" class="accordion-collapse collapse" aria-labelledby="memberTwo" data-bs-parent="#member">
                            <div class="accordion-body">
                              <p class="text-white">It’s a simple and straight forward process to switch to Sharpline from another distributor. Once you’ve uploaded your content to us we will check it over for you and get it delivered to all the digital services. You should then ask your former digital distributor to take your releases down. You don’t need to change UPCs or ISRCs and if you have a sizeable catalog we can help you with tools to bulk upload your catalog into our system. Your streaming and listener numbers on streaming platforms will remain intact.</p>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="memberThree">
                            <button class="accordion-button collapsed text-white font-oswald" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMemberThree" aria-expanded="false" aria-controls="collapseMemberThree">
                                <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg> &nbsp; Is the Sharpline service open to record labels as well as artists?
                            </button>
                          </h2>
                          <div id="collapseMemberThree" class="accordion-collapse collapse" aria-labelledby="memberThree" data-bs-parent="#member">
                            <div class="accordion-body">
                              <p class="text-white">The Sharpline service is just as relevant to record labels as it is to artists and we already have great many record label clients. When you upload a new release to the Sharpline Portal you can set the label name for the release, and this label identity will be displayed on many digital stores and services. If your company operates a number of labels then you can choose which label to associate with each release when you upload it.</p>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="memberFour">
                              <button class="accordion-button collapsed text-white font-oswald" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMemberFour" aria-expanded="false" aria-controls="collapseMemberFour">
                                  <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg> &nbsp; What happens if I want to terminate my agreement?
                              </button>
                            </h2>
                            <div id="collapseMemberFour" class="accordion-collapse collapse" aria-labelledby="memberFour" data-bs-parent="#member">
                              <div class="accordion-body">
                                <p class="text-white">The agreement continues until terminated by either you or us. If you terminate your agreement then we will remove your catalog from our service within 30 days and take it down from our digital partners’ stores and services. Alternatively you can simply remove certain territories or releases from our service, without terminating your whole agreement.</p>
                              </div>
                            </div>
                          </div>
                      </div>
                </div>
            </div>
        </div>


        <div class="row mt-5">
            <div class="col-12">
                <h5 class="font-oswald text-color-primary mb-3">Releasing Music Through Sharpline</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="faqs">
                    <div class="accordion bg-transparent" id="music">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="musicOne">
                            <button class="accordion-button text-white font-oswald " type="button" data-bs-toggle="collapse" data-bs-target="#collapseMusicOne" aria-expanded="true" aria-controls="collapseMusicOne">
                                <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg> &nbsp; How do I submit my music?
                            </button>
                          </h2>
                          <div id="collapseMusicOne" class="accordion-collapse collapse" aria-labelledby="musicOne" data-bs-parent="#music">
                            <div class="accordion-body">
                              <p class="text-white">Your music is submitted via the Sharpline Portal using the uploader. You will receive login details via email once we’ve processed your application and you have been accepted as a Sharpline member. From there you can log in to the Sharpline Portal and access the uploader to upload and distribute your music.</p>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="musicTwo">
                            <button class="accordion-button collapsed text-white font-oswald" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemusicTwo" aria-expanded="false" aria-controls="collapsemusicTwo">
                                <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg> &nbsp; What are the delivery deadlines and timeframes?
                            </button>
                          </h2>
                          <div id="collapsemusicTwo" class="accordion-collapse collapse" aria-labelledby="musicTwo" data-bs-parent="#music">
                            <div class="accordion-body">
                              <p class="text-white">Sharpline has “Direct Live” status with iTunes which means that we are able to deliver a release into iTunes and make it live in the store very quickly. We have fast turnarounds with the other music services too</p>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="musicThree">
                            <button class="accordion-button collapsed text-white font-oswald" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemusicThree" aria-expanded="false" aria-controls="collapsemusicThree">
                                <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg> &nbsp; How Do You Promote Artists?
                            </button>
                          </h2>
                          <div id="collapsemusicThree" class="accordion-collapse collapse" aria-labelledby="musicThree" data-bs-parent="#music">
                            <div class="accordion-body">
                              <p class="text-white">We promote every release our artists release with us on music blogs, magazines & Spotify playlists for FREE. We also pitch to official editorial playlists curated by Spotify, Apple Music, Tidal & Deezer Playlists.</p>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="musicFour">
                              <button class="accordion-button collapsed text-white font-oswald" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemusicFour" aria-expanded="false" aria-controls="collapsemusicFour">
                                  <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg> &nbsp; Which stores will my release appear in?
                              </button>
                            </h2>
                            <div id="collapsemusicFour" class="accordion-collapse collapse" aria-labelledby="musicFour" data-bs-parent="#music">
                              <div class="accordion-body">
                                <p class="text-white">Sharpline supplies more than 100 digital partners in nearly 200 territories as part of our standard service, including all of the leading platforms.</p>
                              </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="musicFive">
                              <button class="accordion-button collapsed text-white font-oswald" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemusicFive" aria-expanded="false" aria-controls="collapsemusicFive">
                                  <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg> &nbsp; How do I get my music on Beatport?
                              </button>
                            </h2>
                            <div id="collapsemusicFive" class="accordion-collapse collapse" aria-labelledby="musicFive" data-bs-parent="#music">
                              <div class="accordion-body">
                                <p class="text-white">Beatport reserves the right to pick the music they make available for sale, and to help them identify which releases they would like to offer they require that each new label applies for inclusion on Beatport via their distributor. An application form is available to begin this process once you’ve been accepted to Sharpline.</p>
                              </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="musicSix">
                              <button class="accordion-button collapsed text-white font-oswald" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemusicSix" aria-expanded="false" aria-controls="collapsemusicSix">
                                  <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg> &nbsp; How can I make money from YouTube?
                              </button>
                            </h2>
                            <div id="collapsemusicSix" class="accordion-collapse collapse" aria-labelledby="musicSix" data-bs-parent="#music">
                              <div class="accordion-body">
                                <p class="text-white">Sharpline is a YouTube Certified company and we can help you get the most from your video strategy. Sharpline will protect your rights on YouTube and collect any royalties you are due for the use of your music in user generated content (UGC) on YouTube. We will also deliver your music into the YouTube Music subscription service ensuring that you are paid for streams of your video and music content on the service. Get in touch with us if you would like to find out how we can help you manage your own YouTube channel. We can help you monetize your videos, limit piracy, and drive views to your music video content.</p>
                              </div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h5 class="font-oswald text-color-primary mb-3">Sales & Accounting Data</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="faqs">
                    <div class="accordion bg-transparent" id="salse">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="salseOne">
                            <button class="accordion-button text-white font-oswald " type="button" data-bs-toggle="collapse" data-bs-target="#collapsesalseOne" aria-expanded="true" aria-controls="collapsesalseOne">
                                <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg> &nbsp; When will I get paid?
                            </button>
                          </h2>
                          <div id="collapsesalseOne" class="accordion-collapse collapse" aria-labelledby="salseOne" data-bs-parent="#salse">
                            <div class="accordion-body">
                              <p class="text-white">Sharpline accounts to you around the 15th day of each month. We issue statements and corresponding payments 45 days after the end of the calendar month in which we receive revenues from digital services for your music.</p>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="salseTwo">
                            <button class="accordion-button collapsed text-white font-oswald" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesalseTwo" aria-expanded="false" aria-controls="collapsesalseTwo">
                                <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg> &nbsp; Where can I see my sales & revenue figures?
                            </button>
                          </h2>
                          <div id="collapsesalseTwo" class="accordion-collapse collapse" aria-labelledby="salseTwo" data-bs-parent="#salse">
                            <div class="accordion-body">
                              <p class="text-white">You can see your revenue on the monthly statement we add to your portal. All of these statements can be cross referenced in our Income Analysis Tool for all time revenue comparisons across territories and stores etc.</p>

                              <p class="text-white">You can also see data feeds on the Sharpline App and in the Digital Sales Tracker in the AWAL Portal. We will support you using and understanding these tools to help you get the most value from your data.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h5 class="font-oswald text-color-primary mb-3">Technical Issues</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="faqs">
                    <div class="accordion bg-transparent" id="issue">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="issueOne">
                            <button class="accordion-button text-white font-oswald " type="button" data-bs-toggle="collapse" data-bs-target="#collapseissueOne" aria-expanded="true" aria-controls="collapseissueOne">
                                <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg> &nbsp; Which audio formats do you accept? Is an MP3 OK?
                            </button>
                          </h2>
                          <div id="collapseissueOne" class="accordion-collapse collapse" aria-labelledby="issueOne" data-bs-parent="#issue">
                            <div class="accordion-body">
                              <p class="text-white">You should prepare the audio as WAV files. We accept up to 24bit / 96kHz.. We only accept</p>

                              <p class="text-white">uncompressed audio files, so no MP3s.</p>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="issueTwo">
                            <button class="accordion-button collapsed text-white font-oswald" type="button" data-bs-toggle="collapse" data-bs-target="#collapseissueTwo" aria-expanded="false" aria-controls="collapseissueTwo">
                                <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg> &nbsp; Can Sharpline provide a UPC code?
                            </button>
                          </h2>
                          <div id="collapseissueTwo" class="accordion-collapse collapse" aria-labelledby="issueTwo" data-bs-parent="#issue">
                            <div class="accordion-body">
                              <p class="text-white">UPC stands for Universal Product Code, it’s essentially a barcode that identifies your release. We assign these automatically (at no charge) if you don’t have your own.</p>
                            </div>
                          </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="issueThree">
                              <button class="accordion-button collapsed text-white font-oswald" type="button" data-bs-toggle="collapse" data-bs-target="#collapseissueThree" aria-expanded="false" aria-controls="collapseissueThree">
                                  <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg> &nbsp; Can Sharpline provide an ISRC code?
                              </button>
                            </h2>
                            <div id="collapseissueThree" class="accordion-collapse collapse" aria-labelledby="issueThree" data-bs-parent="#issue">
                              <div class="accordion-body">
                                <p class="text-white">ISRC stands for International Standard Recording Code. It’s a unique identifier for a recording (different versions such as a Radio Edit and a Live version would have different codes). Again, we assign these automatically (at no charge) once your release has been submitted if the field is left empty.</p>
                              </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="issueFour">
                              <button class="accordion-button collapsed text-white font-oswald" type="button" data-bs-toggle="collapse" data-bs-target="#collapseissueFour" aria-expanded="false" aria-controls="collapseissueFour">
                                  <svg class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg> &nbsp; Do I need permission to include samples of other peoples' music in mine?
                              </button>
                            </h2>
                            <div id="collapseissueFour" class="accordion-collapse collapse" aria-labelledby="issueFour" data-bs-parent="#issue">
                              <div class="accordion-body">
                                <p class="text-white">Yes, you must obtain written permission from the rightsholder of the track you’re sampling in order to ‘clear’ the sample. Without this, you are infringing their copyright, which is not permissible. If your music contains samples, you must provide proof of the relevant license via email before submitting.</p>
                              </div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
