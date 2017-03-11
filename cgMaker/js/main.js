var fileAsModified = function (path, fnCallback) {
  var originalPath = '0000000000'
  $.post('query.php', {fn: cg.fn('lastModified', [path])}, function (data) {
    originalPath = data
  })
  setInterval(function () {
    $.post('query.php', {fn: cg.fn('lastModified', [path])}, function (data) {
      if (typeof fnCallback === 'function') {
        fnCallback(originalPath !== data)
      }
      originalPath = data
    })
  }, 1000)
  this.path = function (path) {
    if (typeof path !== 'undefined' && typeof path === 'string') {
      originalPath = path
      return this
    }
    return path
  }
}
