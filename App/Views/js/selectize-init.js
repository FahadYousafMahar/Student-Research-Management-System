// $(document).ready(function () {
//     var a = $(".js-user-search");
//     a.length && a.selectize({
//         persist: !1,
//         maxItems: 2,
//         valueField: "name",
//         labelField: "name",
//         searchField: ["name"],
//         options: [{
//             image: "/App/Views/img/avatar30-sm.jpg",
//             name: "Marie Claire Stevens",
//             message: "12 Friends in Common",
//             icon: "olymp-happy-face-icon"
//         }, {
//             image: "/App/Views/img/avatar54-sm.jpg",
//             name: "Marie Davidson",
//             message: "4 Friends in Common",
//             icon: "olymp-happy-face-icon"
//         }, {
//             image: "/App/Views/img/avatar49-sm.jpg",
//             name: "Marina Polson",
//             message: "Mutual Friend: Mathilda Brinker",
//             icon: "olymp-happy-face-icon"
//         }, {
//             image: "/App/Views/img/avatar36-sm.jpg",
//             name: "Ann Marie Gibson",
//             message: "New York, NY",
//             icon: "olymp-happy-face-icon"
//         }, {
//             image: "/App/Views/img/avatar22-sm.jpg",
//             name: "Dave Marinara",
//             message: "8 Friends in Common",
//             icon: "olymp-happy-face-icon"
//         }, {
//             image: "/App/Views/img/avatar41-sm.jpg",
//             name: "The Marina Bar",
//             message: "Restaurant / Bar",
//             icon: "olymp-star-icon"
//         }],
//         render: {
//             option: function (a, e) {
//                 return '<div class="inline-items">' + (a.image ? '<div class="author-thumb"><img src="' + e(a.image) + '" alt="avatar"></div>' : "") + '<div class="notification-event">' + (a.name ? '<span class="h6 notification-friend"></a>' + e(a.name) + "</span>" : "") + (a.message ? '<span class="chat-message-item">' + e(a.message) + "</span>" : "") + "</div>" + (a.icon ? '<span class="notification-icon"><svg class="' + e(a.icon) + '"><use xlink:href="icons/icons.svg#' + e(a.icon) + '"></use></svg></span>' : "") + "</div>"
//             },
//             item: function (a, e) {
//                 return '<div><span class="label">' + e(a.name) + "</span></div>"
//             }
//         }
//     })
// });