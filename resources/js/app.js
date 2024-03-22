import "./bootstrap";

import "./../../vendor/power-components/livewire-powergrid/dist/powergrid";
import "./../../vendor/power-components/livewire-powergrid/dist/tailwind.css";

/**
 * @typedef options
 * @see https://developers.google.com/youtube/iframe_api_reference#Loading_a_Video_Player
 * @param {Number} width
 * @param {Number} height
 * @param {String} videoId
 * @param {Object} playerVars
 * @param {Object} events
 */

/**
 * @typedef YT.Player
 * @see https://developers.google.com/youtube/iframe_api_reference
 * */

/**
 * A factory function used to produce an instance of YT.Player and queue function calls and proxy events of the resulting object.
 *
 * @param {YT.Player|HTMLElement|String} elementId Either An existing YT.Player instance,
 * the DOM element or the id of the HTML element where the API will insert an <iframe>.
 * @param {YouTubePlayer~options} options See `options` (Ignored when using an existing YT.Player instance).
 * @param {boolean} strictState A flag designating whether or not to wait for
 * an acceptable state when calling supported functions. Default: `false`.
 * See `FunctionStateMap.js` for supported functions and acceptable states.
 * @returns {Object}
 */
import YouTubePlayer from "youtube-player";

Alpine.data("playerData", (data) => ({
    ytp: null,
    init() {
        this.ytp = YouTubePlayer("ytplayer", {
            videoId: data.ytid,
            playerVars: {
                controls: 1,
            },
        });

        this.ytp.on("stateChange", (event) => {
            if (event.data == 0) {
                this.finishWatched(data);
            }
        });
    },
    async finishWatched(data) {
        await window
            .axios({
                method: "POST",
                url: "/lesson-progress",
                data: JSON.stringify({
                    pbid: data.pbid,
                    ytid: data.ytid,
                    material: data.material,
                }),
                headers: {
                    Accept: "application/json",
                    "content-type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                credentials: "same-origin",
            })
            .then((response) => console.log(response.data))
            .catch((error) => console.log(error.response.data.error));
    },
}));

Alpine.data("materiData", (data) => ({
    vid: "",
    viewVideo(ytid) {
        console.log(ytid);
        YouTubePlayer("ytplayer", {
            videoId: ytid,
            playerVars: {
                controls: 1,
            },
        });
    },
}));
