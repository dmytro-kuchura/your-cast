import React from 'react';
import {connect} from 'react-redux';
import Navigation from './common/navigation';
import {validate} from '../../helpers/validation';
import Buttons from './common/buttons';
import {createShow} from '../../services/show-service';

const rules = {
    'title': ['required'],
    'description': ['string', 'nullable'],
};

class ShowCreate extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            step: 1,
            show: {
                title: '',
                description: ''
            }
        };

        this.handleChangeInput = this.handleChangeInput.bind(this);
        this.handleNextStep = this.handleNextStep.bind(this);
        this.formValid = this.formValid.bind(this);
    }

    handleChangeInput(event) {
        event.preventDefault();

        let input = event.target.name;
        let value = event.target.value;
        let state = Object.assign({}, this.state);

        state.show[input] = value;

        this.setState(state);
    }

    handleNextStep(event) {
        event.preventDefault();

        if (!this.formValid(this.state.show)) {
            return;
        }

        this.props.dispatch(createShow(this.state.show))
            .catch(error => {
                console.log(error);
            })
    }

    formValid(data) {
        for (const [key, value] of Object.entries(data)) {
            if (rules.hasOwnProperty(key)) {
                let valid = validate(key, value, rules[key]);

                return valid === undefined || valid === null;
            }
        }

        return true;
    }

    render() {
        let show = this.state.show;

        return (
            <>
                <div className="container">
                    <div className="card card-custom">
                        <div className="card-body p-0">
                            <div className="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first"
                                 data-wizard-clickable="true">
                                <Navigation/>
                                <div className="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                                    <div className="col-xl-12 col-xxl-7">
                                        <form className="form" id="kt_form">
                                            <div className="pb-5" data-wizard-type="step-content"
                                                 data-wizard-state="current">
                                                <h4 className="mb-10 font-weight-bold text-dark">Setup Your Show
                                                    Info</h4>
                                                <div className="form-group">
                                                    <label>Title</label>
                                                    <input type="text"
                                                           className={validate('title', show.title, rules['title']) ? 'form-control is-invalid' : 'form-control'}
                                                           name="title"
                                                           placeholder="Title"
                                                           onChange={this.handleChangeInput}
                                                           defaultValue={show.title}/>
                                                    <span className="form-text text-danger">
                                                        {validate('title', show.title, rules['title'])}
                                                    </span>
                                                </div>
                                                <div className="form-group">
                                                    <label>Description</label>
                                                    <textarea rows="3"
                                                              className={validate('description', show.description, rules['description']) ? 'form-control is-invalid' : 'form-control'}
                                                              placeholder="Description"
                                                              name="description"
                                                              onChange={this.handleChangeInput}
                                                              value={show.description}/>
                                                    <span className="form-text text-danger">
                                                        {validate('description', show.description, rules['description'])}
                                                    </span>
                                                </div>
                                            </div>
                                            <Buttons step={this.state.step}
                                                     handlePreviousStep={this.handlePreviousStep}
                                                     handleSubmit={this.handleSubmit}
                                                     handleNextStep={this.handleNextStep}
                                            />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}

const mapStateToProps = (state) => {
    return {
        auth: state.Auth,
    }
};

export default connect(mapStateToProps)(ShowCreate)
