import React, { useState } from "react";
import { Formik } from "formik";
import {
  grommet,
  Box,
  Button,
  Grommet,
  FormField,
  Heading,
  Select,
  TextArea,
  TextInput
} from "grommet";

export const SignupForm = () => {
  const [submitted, setSubmitted] = useState(false);
  const [selectValue, setSelectValue] = useState('')

  return (
    <Grommet theme={grommet}>
      <Box align="center" className="bg-secondary">
        <Box width="medium" margin="large">
          <Heading>Signup</Heading>
          <Formik
            initialValues={{
              username: "",
              password: "",
              email_address: "",
              type: "",
              phone_number: "",
              confirm_password: ""
            }}
            validate={values => {
              const errors = {};
              if (!values.username) {
                errors.name = "required";
              }
              if (!values.email_address) {
                errors.email_address = "required";
              }
              if (!values.type) {
                errors.type = "required";
              }
              if (!values.phone_number) {
                errors.phone_number = "required";
              }
              if (
                values.phone_number.length !== 10 ||
                isNaN(values.phone_number)
              ) {
                errors.phone_number = "invalid phone number";
              }
              if (!values.password) {
                errors.password = "required";
              }
              if (values.confirm_password !== values.password) {
                errors.confirm_password = "passwords do not match";
              }
              return errors;
            }}
            validateOnBlur={submitted}
            validateOnChange={submitted}
            onSubmit={(values, { setSubmitting }) => {
              // whatever submitting the form should entail
              alert("Submitting\n" + JSON.stringify(values, null, 2));
              setSubmitted(true);
              setSubmitting();
            }}
          >
            {({
              values,
              errors,
              handleChange,
              handleBlur,
              handleSubmit,
              setFieldValue
            }) => (
              <form
                onSubmit={event => {
                  event.preventDefault();
                  handleSubmit();
                }}
              >
                <FormField label="Username" error={errors.username}>
                  <TextInput
                    name="username"
                    value={values.username || ""}
                    onChange={handleChange}
                  />
                </FormField>
                <FormField label="Phone Number" error={errors.phone_number}>
                  <TextInput
                    name="phone_number"
                    value={values.phone_number || ""}
                    onChange={handleChange}
                  />
                </FormField>
                <FormField label="Email" error={errors.email_address}>
                  <TextInput
                    name="email_address"
                    value={values.email_address || ""}
                    onChange={handleChange}
                  />
                </FormField>
                <FormField label="User Type" error={errors.type}>
                  <Select
                    name="type"
                    options={["Job Seeker", "Administrator"]}
                    value={selectValue}
                    onChange={({ option }) => {
                      values.type = option;
                      setSelectValue(option)
                      return option;
                    }}
                    onBlur={handleBlur}
                  />
                </FormField>
                <FormField label="Password" error={errors.password}>
                  <TextInput
                    name="password"
                    type="password"
                    value={values.password || ""}
                    onChange={handleChange}
                  />
                </FormField>
                <FormField
                  label="Confirm Password"
                  error={errors.confirm_password}
                >
                  <TextInput
                    name="confirm_password"
                    type="password"
                    value={values.confirm_password || ""}
                    onChange={handleChange}
                    onBlur={() => {
                      if (values.password !== values.confirm_password) {
                        return alert("Passwords do not match");
                      }
                    }}
                  />
                </FormField>
                {console.log("values", values)}
                <Box
                  tag="footer"
                  margin={{ top: "medium" }}
                  direction="row"
                  justify="between"
                >
                  <Button
                    type="submit"
                    style={{ backgroundColor: "#444444", color: "white" }}
                    color="white"
                    label="Create"
                    theme={grommet}
                  />
                </Box>
              </form>
            )}
          </Formik>
        </Box>
      </Box>
    </Grommet>
  );
};
