export default {
  init() {
    // JavaScript to be fired on the about us page
  },
  finalize() {
    var anchor = location.hash;
    if (anchor) {
      //console.log('this: ' + anchor);
      $(anchor).modal();
    }
  },
};
