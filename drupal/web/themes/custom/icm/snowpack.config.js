// Snowpack Configuration File
// See all supported options: https://www.snowpack.dev/reference/configuration

/** @type {import("snowpack").SnowpackUserConfig } */
module.exports = {
  mount: {
    "src/": "/",
  },
  plugins: [
    [
      "@snowpack/plugin-babel",
      {
        input: [".js", ".mjs", ".jsx", ".ts", ".tsx"],
        transformOptions: {
          presets: ["@babel/preset-env"],
          targets: {
            browsers: "> 0.00%",
          },
        },
      },
    ],
    [
      "@snowpack/plugin-sass",
      {
        compilerOptions: {
          style: "compressed",
          loadPath: "src/style",
          sourceMap: true,
          embedSourceMap: true,
        },
      },
    ],
  ],
  packageOptions: {
    /* ... */
  },
  devOptions: {
    /* ... */
  },
  buildOptions: {
    out: "dist/",
    sourceMap: true,
    /* ... */
  },
  optimize: {
    minify: true,
    // sourceMap: "external",
    targets: "es2017",
  },
};
