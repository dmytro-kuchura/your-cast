import React from 'react';
import categories from '../../../helpers/categories.json';

class StepFifth extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            show: {},
            first_category: '',
            first_sub_category: '',
            first_sub_category_disabled: true,
            second_category: '',
            second_sub_category: '',
            second_sub_category_disabled: true,
            third_category: '',
            third_sub_category: '',
            third_sub_category_disabled: true
        };

        this.state.show = props.show;

        this.hasChildCategory = this.hasChildCategory.bind(this);
        this.prepareCategory = this.prepareCategory.bind(this);
        this.handleChangeCategory = this.handleChangeCategory.bind(this);
        this.handleChangeSubCategory = this.handleChangeSubCategory.bind(this);
    }

    componentDidUpdate(prevProps) {
        if (prevProps.show !== this.props.show) {
            this.setState({show: this.props.show})
        }
    }

    handleChangeCategory(event) {
        let input = event.target.name;
        let value = event.target.value;

        switch (input) {
            case 'first-category':
                this.setState({
                    first_category: value,
                    first_sub_category_disabled: !this.hasChildCategory(value)
                }, () => {
                    this.prepareCategory();
                });
                break;
            case 'second-category':
                this.setState({
                    second_category: value,
                    second_sub_category_disabled: !this.hasChildCategory(value)
                }, () => {
                    this.prepareCategory();
                });
                break;
            case 'third-category':
                this.setState({
                    third_category: value,
                    third_sub_category_disabled: !this.hasChildCategory(value)
                }, () => {
                    this.prepareCategory();
                });
                break;
        }

        this.prepareCategory(this.state);
    }

    handleChangeSubCategory(event) {
        let input = event.target.name;
        let value = event.target.value;

        switch (input) {
            case 'first-sub-category':
                this.setState({
                    first_sub_category: value,
                }, () => {
                    this.prepareCategory();
                });
                break;
            case 'second-sub-category':
                this.setState({
                    second_sub_category: value,
                }, () => {
                    this.prepareCategory();
                });
                break;
            case 'third-sub-category':
                this.setState({
                    third_sub_category: value,
                }, () => {
                    this.prepareCategory();
                });
                break;
        }
    }

    hasChildCategory(code) {
        let hasChild = false

        categories.forEach(function (category) {
            if (category.code === code) {
                if (category.hasOwnProperty('children')) {
                    hasChild = true;
                }
            }
        })

        return hasChild;
    }

    prepareCategory() {
        let category = [];

        if (this.state.first_category) {
            category.push(this.state.first_category)
        }
        if (this.state.first_sub_category) {
            category.push(this.state.first_sub_category)
        }
        if (this.state.second_category) {
            category.push(this.state.second_category)
        }
        if (this.state.second_sub_category) {
            category.push(this.state.second_sub_category)
        }
        if (this.state.third_category) {
            category.push(this.state.third_category)
        }
        if (this.state.third_sub_category) {
            category.push(this.state.third_sub_category)
        }

        this.props.updateCategory(category.join(';'));
    }

    render() {
        return (
            <>
                <h4 className="create-form-title">Categorization</h4>

                <p className="text-muted">
                    At least one category is required to create your show.
                    These are used by podcast apps for example Google Podcasts to categorize shows.
                </p>

                <div className="row">
                    <div className="col-md-6">
                        <div className="form-group">
                            <label htmlFor="first-category">1st category</label>
                            <select className="form-control"
                                    id="first-category"
                                    name="first-category"
                                    value={this.state.first_category}
                                    onChange={this.handleChangeCategory}>
                                <option>Select One</option>
                                <Categories categories={categories}/>
                            </select>
                        </div>
                    </div>
                    <div className="col-md-6">
                        <div className="form-group">
                            <label htmlFor="first-sub-category">Sub category</label>
                            <select className="form-control"
                                    id="first-sub-category"
                                    name="first-sub-category"
                                    onChange={this.handleChangeSubCategory}
                                    disabled={this.state.first_sub_category_disabled}>
                                <option>Select One</option>
                                <SubCategory selected={this.state.first_category} categories={categories}/>
                            </select>
                        </div>
                    </div>
                </div>
                <div className="row">
                    <div className="col-md-6">
                        <div className="form-group">
                            <label htmlFor="second-category">2nd category</label>
                            <select className="form-control"
                                    id="second-category"
                                    name="second-category"
                                    value={this.state.second_category}
                                    onChange={this.handleChangeCategory}>
                                <option>Select One</option>
                                <Categories categories={categories}/>
                            </select>
                        </div>
                    </div>
                    <div className="col-md-6">
                        <div className="form-group">
                            <label htmlFor="second-sub-category">Sub category</label>
                            <select className="form-control"
                                    id="second-sub-category"
                                    name="second-sub-category"
                                    onChange={this.handleChangeSubCategory}
                                    disabled={this.state.second_sub_category_disabled}>
                                <option>Select One</option>
                                <SubCategory selected={this.state.second_category} categories={categories}/>
                            </select>
                        </div>
                    </div>
                </div>
                <div className="row">
                    <div className="col-md-6">
                        <div className="form-group">
                            <label htmlFor="third-category">3rd category</label>
                            <select className="form-control"
                                    id="third-category"
                                    name="third-category"
                                    value={this.state.third_category}
                                    onChange={this.handleChangeCategory}>
                                <option>Select One</option>
                                <Categories categories={categories}/>
                            </select>
                        </div>
                    </div>
                    <div className="col-md-6">
                        <div className="form-group">
                            <label htmlFor="third-sub-category">Sub category</label>
                            <select className="form-control"
                                    id="third-sub-category"
                                    name="third-sub-category"
                                    onChange={this.handleChangeSubCategory}
                                    disabled={this.state.third_sub_category_disabled}>
                                <option>Select One</option>
                                <SubCategory selected={this.state.third_category} categories={categories}/>
                            </select>
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
    let selected = props.selected;
    let list = [];
    let html;

    if (!selected) {
        return null;
    }


    props.categories.map((category) => {
        if (category.code === selected) {
            if (category.hasOwnProperty('children')) {
                category.children.map((children) => {
                    list.push({
                        'code': children.code,
                        'name': children.name
                    });
                })
            }
        }
    })

    if (!list.length) {
        return null;
    }

    html = list.map((category) => {
        return (
            <option key={category.code} value={category.code}>{category.name}</option>
        )
    })

    return html;
};

export default StepFifth;
