// /*import React, { Component } from "react";
/*
import { Provider, ReactReduxContext } from "react-redux";
import ReactDOM from "react-dom";
import LayoutContainer from "./components/containers/LayoutContainer";
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";
let propTypes = require("prop-types");
import store from "./components/store/index";

ReactDOM.render(
  <Provider store={store}>
    <Router>
      <LayoutContainer />
    </Router>
  </Provider>,
  document.getElementById("root")
);
window.store = store;*/

require("../sass/main.scss");
require("@fortawesome/fontawesome-free/css/all.css");
require("@fortawesome/fontawesome-free/js/all.js");


// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require("bootstrap/dist/css/bootstrap.min.css");
require("bootstrap/dist/js/bootstrap.min");

// or you can include specific pieces
// require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');
