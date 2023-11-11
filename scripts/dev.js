const fs = require('fs');
const bs = require("browser-sync").create()
const path = require("path")
const lessc = require("less")
const rootPath = path.resolve(__dirname, "..")


fs.readFile(path.join(rootPath, "/tailwind.less"), (err, data) => {
  lessc.render(data.toString(), (e, css) => {
    fs.writeFile(path.join(rootPath, "/style.css"), css.css.toString(), () => {})
    // tailwindcss.run("-i style.css")
  })
})
// bs.watch(["tailwind.less"], {}, function () {
  // lessc.render
// })

// bs.init({ ui:false, open: false, server: false })
