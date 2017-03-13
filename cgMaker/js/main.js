var fileAsModified = function (path,fnCallback) {
  var originalPath = path;
  var originalTime = '';
  $.post('query.php',{fn: cg.fn('lastModified',[originalPath])}, function(data) {
    originalTime = data;
  });
  setInterval(function () {
    $.post('query.php',{fn: cg.fn('lastModified',[originalPath])}, function(data) {
      if (typeof fnCallback === 'function') {
        fnCallback(originalTime !== data);
      }
      originalTime = data;
    });
  }, 100);
  this.path = function (path) {

    if (typeof path === 'string') {
      originalPath = path;
      return this;
    }
    return originalPath;
  }
}
