import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Header from './Header'
import NewProject from './NewProject'
import ProjectsList from './ProjectsList'
import CondominiumsList from './condominiums/Index'
import SingleCondominium from './condominiums/Show'
import NewCondominium from './condominiums/Create'
import EditCondominium from './condominiums/Edit'

import KitnetsList from './kitnets/Index'
import NewKitnet from './kitnets/Create'
import EditKitnet from './kitnets/Edit'
import SingleKitnet from './condominiums/Show'
import Page404 from './Page404'


class App extends Component {
    render () {
        return (
            <BrowserRouter basename="/">
                <div>
                    <Header />
                    <Switch>
                        <Route path='/kitnets' component={KitnetsList} />
                        <Route path='/create-kitnet' component={NewKitnet} />
                        <Route path='/edit-kitnet/:id' component={EditKitnet} />
                        <Route path='/kitnet/:id' component={SingleKitnet} />

                        <Route path='/condominiums' component={CondominiumsList} />
                        <Route path='/create-condominium' component={NewCondominium} />
                        <Route path='/edit-condominium/:id' component={EditCondominium} />
                        <Route path='/condominium/:id' component={SingleCondominium} />
                        <Route path='*' component={Page404} />
                    </Switch>
                </div>
            </BrowserRouter>
        )
    }
}

ReactDOM.render(<App />, document.getElementById('app'))