import React from "react";
import { Route, Switch, useRouteMatch } from "react-router-dom";
import CondominiumsList from "./condominiums/Index";
import SingleCondominium from "./condominiums/Show";
import NewCondominium from "./condominiums/Create";
import EditCondominium from "./condominiums/Edit";
import Header from "../Header";

import KitnetsList from "./kitnets/Index";
import NewKitnet from "./kitnets/Create";
import EditKitnet from "./kitnets/Edit";
import SingleKitnet from "./condominiums/Show";

const Dashboard = () => {
    let { path, url } = useRouteMatch();
    return (
        <div>
            <Header />
            <Switch>
                <Route path={`${path}/kitnets`} component={KitnetsList} />
                <Route path={`${path}/create-kitnet`} component={NewKitnet} />
                <Route
                    path={`${path}/edit-kitnet/:id`}
                    component={EditKitnet}
                />
                <Route path={`${path}/kitnet/:id`} component={SingleKitnet} />

                <Route
                    path={`${path}/condominiums`}
                    component={CondominiumsList}
                />
                <Route
                    path={`${path}/create-condominium`}
                    component={NewCondominium}
                />
                <Route
                    path={`${path}/edit-condominium/:id`}
                    component={EditCondominium}
                />
                <Route
                    path={`${path}/condominium/:id`}
                    component={SingleCondominium}
                />
            </Switch>
        </div>
    );
};

export default Dashboard;
