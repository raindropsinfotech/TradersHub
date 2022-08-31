import React, { Component } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Container, Row, Col, Card, ListGroup} from 'react-bootstrap';
import { Link, Head } from '@inertiajs/inertia-react';
import moment from 'moment';
import FFMPEG from "react-ffmpeg";

class Courses extends Component{
    constructor(props){
        super(props);
        this.state = {
            course_categories: this.props.course_cat,
        };
        this.addDays = this.addDays.bind(this);
        this.priceshow = this.priceshow.bind(this);
    }

    componentDidMount(){}

    recommended(nextProps){}
    
    addDays(date, days) {
        var result = new Date(date);
        result.setDate(result.getDate() + days);
        return result;
    }

    priceshow(course_price,course_sale_price){
        let price;
        if(course_price != null &&  course_sale_price != null ){
            price = "<span><del>$"+course_price+"</del> $"+course_sale_price+"</span>";
        }else if (course_price != null &&  course_sale_price == null){
            price = "<span>$"+course_price+"</span>";
        
        }else if (course_price == null &&  course_sale_price != null){
            price = "<span>$"+course_sale_price+"</span>";
        }else if (course_price == null &&  course_sale_price == null){
            price = "<span>Free</span>";
        }
        return price;
    }
    
    render(){
        return(
            <Authenticated
            auth={this.props.auth}
            errors={this.props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">View Course</h2>}
        >
            <Head title="View Course" />
          
            <div className="py-12">
                <Container>
                    <Row className="justify-content-sm-center">
                        <Col xs={12} md={12}>
                            {/* <Card>
                                <Card.Header as="h5" className="text-center">{props.view_cources.course_name}</Card.Header>
                            <Card.Body>
                                <Card.Text dangerouslySetInnerHTML={{__html: props.view_cources.course_content }} />
                                <iframe width="560" height="315" frameBorder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" src={props.view_cources.course_video_link}/>
                            </Card.Body>
                            </Card> */}
                            <Card>
                                <iframe width="100%" height="315" frameBorder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" src={this.props.view_cources.course_video_link.replace('.com', '-nocookie.com')}/>
                                <Card.Body>
                                    <Card.Title>Course name :</Card.Title>
                                    <Card.Text>{this.props.view_cources.course_name}</Card.Text>
                                    <Card.Title>Course content :</Card.Title>
                                    <Card.Text dangerouslySetInnerHTML={{ __html: this.props.view_cources.course_content }}></Card.Text>
                                    <Row>
                                        <Col>
                                            <Card.Title>Course price :</Card.Title>
                                            <Card.Text dangerouslySetInnerHTML={{ __html: this.priceshow(this.props.view_cources.course_price, this.props.view_cources.course_sale_price) }}></Card.Text>
                                        </Col>
                                        <Col>
                                            <Card.Title>Course created :</Card.Title>
                                            <Card.Text>{moment(this.props.view_cources.created_at).fromNow()}</Card.Text>
                                        </Col>
                                        <Col>
                                            <Card.Title>Course expire :</Card.Title>
                                            <Card.Text>{moment(this.addDays(this.props.view_cources.created_at, this.props.view_cources.course_expiration_day)).fromNow()}</Card.Text>
                                        </Col>
                                        <Col>
                                            <Card.Title>Course category :</Card.Title>
                                            <Card.Text>{this.state.course_categories}</Card.Text>
                                        </Col>
                                    </Row>
                                </Card.Body>
                            </Card>
                        </Col>
                    </Row>
                </Container>
            </div>
        </Authenticated>
        );
    }
}
export default Courses;