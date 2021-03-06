import React, { Component } from "react";
import ReactDOM from "react-dom";
import { BrowserRouter, Route, Switch } from "react-router-dom";
import Page404 from "./Page404";
import Home from "./Client/Home";
import Rent from "./Client/Rent";
import About from "./Client/About";
import Dashboard from "./Dashboard";
import Condo from "./Client/Condo";
import Commercial from "./Client/Commercial";
import RentPage from "./Client/RentPage";

class App extends Component {
    render() {
        return (
            <BrowserRouter basename="/">
                <div>
                    <Switch>
                        <Route path="/" exact component={Home} />
                        <Route path="/rent" component={Rent} />
                        <Route path="/condo/:id" component={Condo} />
                        <Route path="/commercial/:id" component={Commercial} />
                        <Route path="/kitnet/:id" component={RentPage} />
                        <Route path="/about" component={About} />
                        <Route path="/adm" component={Dashboard} />
                        <Route path="*" component={Page404} />
                    </Switch>
                </div>
            </BrowserRouter>
        );
    }
}

ReactDOM.render(<App />, document.getElementById("app"));
