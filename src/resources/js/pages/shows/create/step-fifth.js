import React from 'react';
import categories from '../../../helpers/categories.json';

class StepFifth extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            show: {}
        };

        this.state.show = props.show;
    }

    componentDidUpdate(prevProps) {
        if (prevProps.show !== this.props.show) {
            this.setState({show: this.props.show})
        }
    }

    render() {
        return (
            <>
                <div className="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                    <h4 className="mb-10 font-weight-bold text-dark">Categorization</h4>

                    <p className="text-muted">
                        At least one category is required to create your show.
                        These are used by podcast apps for example Google Podcasts to categorize shows.
                    </p>

                    <div className="row">
                        <div className="col-md-6">
                            <div className="form-group">
                                <label htmlFor="exampleSelect1">1st category</label>
                                <select className="form-control" id="first-category">
                                    <option></option>
                                    <Categories categories={categories}/>
                                </select>
                            </div>
                        </div>
                        <div className="col-md-6">
                            <div className="form-group">
                                <label htmlFor="exampleSelect1">Sub category</label>
                                <select className="form-control" id="exampleSelect1" disabled={true}>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div className="row">
                        <div className="col-md-6">
                            <div className="form-group">
                                <label htmlFor="exampleSelect1">2nd category</label>
                                <select className="form-control" id="exampleSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div className="col-md-6">
                            <div className="form-group">
                                <label htmlFor="exampleSelect1">Sub category</label>
                                <select className="form-control" id="exampleSelect1" disabled={true}>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div className="row">
                        <div className="col-md-6">
                            <div className="form-group">
                                <label htmlFor="exampleSelect1">3rd category</label>
                                <select className="form-control" id="exampleSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div className="col-md-6">
                            <div className="form-group">
                                <label htmlFor="exampleSelect1">Sub category</label>
                                <select className="form-control" id="exampleSelect1" disabled={true}>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}

const Categories = (props) => {
    let list = props.categories;
    let html;

    html = list.map((category) => {
        return (
            <option key={category.code} value={category.code}>{category.name}</option>
        )
    })

    return html;
};

const SubCategory = (props) => {
    let list = props.categories;
    let html;

    html = list.map((category) => {
        return (
            <option key={category.code} value={category.code}>{category.name}</option>
        )
    })

    return html;
};

export default StepFifth;
